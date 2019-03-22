<!--弹窗--释放BTC弹窗内容-->
<div class="popup sellpop">
    <div class="notice">请在 <span class="times cRed"></span> <span class="cRed">秒</span>内确定下单，确保价格无浮动</div>
    <div class="text bd">
        <h3 class="title">交易价格（CNY/BTC）</h3>
        <p class="num cRed"><b id="J_price_info">73,000</b></p>
        <p class="xe" id="J_single_info">单笔交易限额 20,000~80,000 CNY</p>
    </div>
    <div class="form mt15">
        <label class="font-c333" id="J_quantity_info"></label>
        <div class="sp-input-wrap mb20">
            <input class="yb-input" type="text" id="J_quantity">
            <a class="all-btn" href="javascript:" data-all-quantity="" id="J_all_quantity">最大</a>
        </div>
        <label class="font-c333">交易金额 CNY</label>
        <div class="sp-input-wrap">
            <input class="yb-input" type="text" id="J_amount">
            <a class="all-btn" href="javascript:" data-all-amount="" id="J_all_amount">最大</a>
        </div>
    </div>
    <div class="btns clearfix">
        <a id="cancelBtn" class="yb-btn blue fl" href="javascript:">（<span class="times"></span>s）自动取消</a>
        <a id="confirmBtn" class="yb-btn fr" data-id="" data-type="" data-price="" data-amount-min=""
           data-amount-max="" href="javascript:">确定</a>
    </div>
</div>