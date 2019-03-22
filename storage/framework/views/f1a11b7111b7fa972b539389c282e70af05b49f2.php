<?php $__env->startSection("title"); ?>
    <title><?php echo e(___('_main.login')); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
<div class="banner">
    <div class="swiper-container bn-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="img/banner02.jpg" alt="">
            </div>
            <div class="swiper-slide">
                <img src="img/banner01.jpg" alt="">
            </div>
        </div>
        <!-- 如果需要分页器 -->
        <div class="page-wrap">
            <span class="swiper-pagination page"></span>
        </div>

        <!-- 如果需要导航按钮 -->
        <!--<div class="swiper-button-prev"></div>-->
        <!--<div class="swiper-button-next"></div>-->
    </div>
</div>
<!--公告-->
<div class="notice">
    <div class="wrap1200">
        <i></i>
        <ul>
            <li>
                <span>【公告】：最多可支持10条数据</span>
            </li>
            <li>
                <span>【公告】：最多可支持10条数据，发射点发射点犯得上手动阀手动阀了老师肯定发士大夫顺丰速递</span>
            </li>
            <li>
                <span>【公告】：最多可支持10条数据，分高、中、低的发射点发射点犯得上手动阀手动阀了老师肯定发士大夫顺丰速递</span>
            </li>
            <li>
                <span>【公告】：最多可支持10条数据，分高、中发射点发射点犯得上手动阀手动阀了老师肯定发士大夫顺丰速递</span>
            </li>
            <li>
                <span>【公告】：最多可支持10条射点发射点犯得上手动阀手动阀了老师肯定发士大夫顺丰速递</span>
            </li>
        </ul>
    </div>
</div>
<!--推荐展示区-->
<div class="recArea ">
    <ul class="wrap1200 clearfix">
        <li>
            <div class="line"></div>
            <div class="img-wrap">
                <img src="img/head01.jpg" alt="">
                <i class="point green"></i>
            </div>
            <div class="times">
                <span>交易次数<br><b>88</b></span>
                <span>信任人数<br><b>99</b></span>
            </div>
            <div class="btc">
                BTC：RMB=1.00：75416.38
            </div>
            <p class="pay">交易限额：500~10000</p>
            <p class="pay">付款方式：500~10000</p>
            <div class="btns">
                <a class="yb-btn" href="javascript:">买入</a>
            </div>
        </li>
        <li>
            <div class="line"></div>
            <div class="img-wrap">
                <img src="img/head02.jpg" alt="">
                <i class="point"></i>
            </div>
            <div class="times">
                <span>交易次数<br><b>88</b></span>
                <span>信任人数<br><b>99</b></span>
            </div>
            <div class="btc">
                BTC：RMB=1.00：75416.38
            </div>
            <p class="pay">交易限额：500~10000</p>
            <p class="pay">付款方式：500~10000</p>
            <div class="btns">
                <a class="yb-btn greenBg" href="javascript:">卖出</a>
            </div>
        </li>
        <li>
            <div class="line"></div>
            <div class="img-wrap">
                <img src="img/head01.jpg" alt="">
                <i class="point green"></i>
            </div>
            <div class="times">
                <span>交易次数<br><b>88</b></span>
                <span>信任人数<br><b>99</b></span>
            </div>
            <div class="btc">
                BTC：RMB=1.00：75416.38
            </div>
            <p class="pay">交易限额：500~10000</p>
            <p class="pay">付款方式：500~10000</p>
            <div class="btns">
                <a class="yb-btn" href="javascript:">买入</a>
            </div>
        </li>
        <li>
            <div class="line"></div>
            <div class="img-wrap">
                <img src="img/head01.jpg" alt="">
                <i class="point green"></i>
            </div>
            <div class="times">
                <span>交易次数<br><b>88</b></span>
                <span>信任人数<br><b>99</b></span>
            </div>
            <div class="btc">
                BTC：RMB=1.00：75416.38
            </div>
            <p class="pay">交易限额：500~10000</p>
            <p class="pay">付款方式：500~10000</p>
            <div class="btns">
                <a class="yb-btn" href="javascript:">买入</a>
            </div>
        </li>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>