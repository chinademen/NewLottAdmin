<?php

namespace App\Database;

use Closure;
use Exception;
use Throwable;
use Illuminate\Database\MySqlConnection;

class TidbConnection extends MySqlConnection {
    public function transaction(Closure $callback) {
        $this->beginTransaction();

        // We'll simply execute the given callback within a try / catch block
        // and if we catch any exception we can rollback the transaction
        // so that none of the changes are persisted to the database.
        try {
            $result = $callback($this);

            $this->commit();
        }

            // If we catch an exception, we will roll back so nothing gets messed
            // up in the database. Then we'll re-throw the exception so it can
            // be handled how the developer sees fit for their applications.
        catch (Exception $e) {
            $this->rollBack();

            throw $e;
        } catch (Throwable $e) {
            $this->rollBack();

            throw $e;
        }

        return $result;
    }

    /**
     * Start a new database transaction.
     *
     * @return void
     * @throws Exception
     */
    public function beginTransaction() {
        ++$this->transactions;

        if ($this->transactions == 1) {
            try {
                $this->pdo->exec('START TRANSACTION');
            } catch (Exception $e) {
                --$this->transactions;

                throw $e;
            }
        } elseif ($this->transactions > 1 && $this->queryGrammar->supportsSavepoints()) {
            $this->pdo->exec(
                $this->queryGrammar->compileSavepoint('trans' . $this->transactions)
            );
        }

        $this->fireConnectionEvent('beganTransaction');
    }

    /**
     * Commit the active database transaction.
     *
     * @return void
     */
    public function commit() {
        if ($this->transactions == 1) {
            $this->pdo->exec('COMMIT');
        }

        --$this->transactions;

        $this->fireConnectionEvent('committed');
    }

    /**
     * Rollback the active database transaction.
     *
     * @return void
     */
    public function rollBack() {
        if ($this->transactions == 1) {
            $this->pdo->exec('ROLLBACK');
        } elseif ($this->transactions > 1 && $this->queryGrammar->supportsSavepoints()) {
            $this->pdo->exec(
                $this->queryGrammar->compileSavepointRollBack('trans' . $this->transactions)
            );
        }

        $this->transactions = max(0, $this->transactions - 1);

        $this->fireConnectionEvent('rollingBack');
    }
}