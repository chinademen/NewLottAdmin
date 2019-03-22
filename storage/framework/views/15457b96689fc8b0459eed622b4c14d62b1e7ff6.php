<?php if($paginator->total()): ?>
    <div class="yb-page tc">
        <a class="prev" href="<?php echo e(($paginator->currentPage() == 1) ? 'javascript:;' : $paginator->url(1)); ?> "><</a>
        <?php for($i = 1; $i <= $paginator->lastPage(); $i++): ?>
            <?php if($paginator->currentPage() == $i): ?>
                <span><?php echo e($i); ?></span>
            <?php else: ?>
                <a href="<?php echo e($paginator->url($i)); ?>"><?php echo e($i); ?></a>
            <?php endif; ?>
        <?php endfor; ?>
        <a class="next"
           href=" <?php echo e(($paginator->currentPage() == $paginator->lastPage()) ? 'javascript:;' : $paginator->url($paginator->currentPage()+1)); ?>">></a>
    </div>
<?php endif; ?>