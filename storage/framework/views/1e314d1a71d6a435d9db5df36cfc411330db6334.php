<?php $__env->startSection("title"); ?>
    <title><?php echo e(___('_main.title.first_page')); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <div class="banner">
        <div class="swiper-container bn-container">
            <div class="swiper-wrapper">
                <?php $__currentLoopData = $oAdLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oAdList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="swiper-slide">
                        <img src="<?php echo e(env("STATIC_RES_URL")."/".$oAdList->content); ?>" alt="<?php echo e($oAdList->title); ?>"/>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <!-- 如果需要分页器 -->
            <div class="page-wrap">
                <span class="swiper-pagination page"></span>
            </div>

            <!-- 如果需要导航按钮 -->
            
            
        </div>
    </div>
    <!--公告-->
    <div class="notice">
        <div class="wrap1200">
            <i></i>
            <?php if(!empty($oCmsArticles)): ?>
                <ul>
                    <?php $__currentLoopData = $oCmsArticles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oCmsArticle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <span><?php echo e($oCmsArticle->title); ?></span>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </ul>
            <?php endif; ?>
        </div>
    </div>

    <!--推荐展示区-->
    <div class="recArea ">
        <ul class="wrap1200 clearfix">
            <?php $__currentLoopData = $oAdvertiseList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <div class="line"></div>
                    <div class="img-wrap">
                        <img src="<?php echo e(empty($value->avatar)?env("DEFAULT_AVATAR"):env("STATIC_RES_URL"). "/" .$oUser->avatar); ?>"
                             alt="">
                        <i class="point green"></i>
                    </div>
                    <div class="times">
                        <span>交易次数<br><b><?php echo e($value->total_number); ?></b></span>
                        <span>信任人数<br><b><?php echo e($value->trust_num); ?></b></span>
                    </div>
                    <div class="btc">
                        BTC：RMB=1.00：<?php echo e($value->price); ?>

                    </div>
                    <p class="pay">交易限额：<?php echo e($value->single_min); ?>~<?php echo e($value->single_max); ?></p>
                    <p class="pay">付款方式：<?php echo e($value->payment_method); ?></p>
                    <div class="btns">
                        <a class="yb-btn <?php if($value->type == 1): ?> greenBg <?php endif; ?>" href="javascript:;"
                           <?php if($value->type == 1): ?> data-type="buy"
                           <?php else: ?> data-type="sell" <?php endif; ?>
                           amount-min="<?php echo e(number_format($value->single_min,2)); ?>"
                           amount-max="<?php echo e(number_format($value->single_max,2)); ?>"
                           quantity="<?php echo e(number_format($value->quantity,8)); ?>"
                           price="<?php echo e(number_format($value->price,2)); ?>"
                           amount="<?php echo e(number_format($value->amount,2)); ?>"
                           data-id="<?php echo e($value->id); ?>"
                           onclick="<?php if(Auth::check()): ?>yb.tradeWindow($(this),'<?php echo e($iOrderTimeLimit); ?>')<?php else: ?> yb.checkAuthWindow('/auth/login','/auth/register')<?php endif; ?>"><?php if($value->type == 1): ?>
                                卖给他BTC <?php elseif($value->type == 2): ?>买进他的BTC <?php endif; ?></a>
                    </div>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>

    <!--放心可靠-->
    <div class="marks pb148">
        <ul class="clearfix">
            <li>
                <img src="img/homeMark01.png" alt="">
                <h3>放心可靠</h3>
                <p>超过十年交易系统风控团队</p>
                <p>全面打造无漏洞交易体系</p>
            </li>
            <li>
                <img src="img/homeMark02.png" alt="">
                <h3>快速便捷</h3>
                <p>用户之间可通过多种资金渠道</p>
                <p>进行及时自由交易</p>
            </li>
            <li>
                <img src="img/homeMark03.png" alt="">
                <h3>覆盖面广</h3>
                <p>市场所有行情随时掌握</p>
                <p>无需跳转第三方平台查询s</p>
            </li>
        </ul>
    </div>
    <?php echo $__env->make("layout.trade_window", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("script"); ?>
    <?php echo e(script('trade')); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>