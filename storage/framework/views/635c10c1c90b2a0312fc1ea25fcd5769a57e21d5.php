<?php $__env->startSection("title"); ?>
    <title>订单详情-<?php echo e($oOrder->order_number); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>
    <!--中间内容区-->
    <div class="content mt30 clearfix wrap1200">
        <div class="yb-breadcrumb">
            <div class="bc-wrap">
                <a href="<?php echo e(route("order-manage.index")); ?>" mk=">">订单管理</a>
                <span>订单详情</span>
            </div>
        </div>
        <!--订单详情-->
        <div class="orderDetail mt10">
            <div class="od-title clearfix">
                <h3><?php if($oUser->id == $oOrder->buyer_id): ?> 买进 <?php elseif($oUser->id == $oOrder->seller_id): ?>卖出 <?php endif; ?>
                    BTC</h3>
                <p class="num">订单号<b>#<?php echo e($oOrder->order_number); ?></b></p>

                <?php if($oOrder->status == $oOrder::STATUS_ONE): ?>
                    <p class="time">待付款 <b class="red" id="J_countdown">
                            00小时00分00秒
                        </b> 后将关闭交易</p>
                <?php endif; ?>
            </div>
            <div class="steps clearfix">
                <div class="step-wrap">
                    <div class="item active">
                        <p>已拍下</p>
                        <div class="item-cycle clearfix">
                            <div class="line vhide"></div>
                            <div class="cycle"><i class="icon iconfont icon-gouxuan"></i></div>
                            <div class="line"></div>
                        </div>
                    </div>

                    <?php if(in_array($oOrder->status, [$oOrder::STATUS_THREE, $oOrder::STATUS_TWO, $oOrder::STATUS_FOUR, $oOrder::STATUS_SIX])): ?>
                        <div class="item active">
                            <p>已付款</p>
                            <div class="item-cycle clearfix">
                                <div class="line"></div>
                                <div class="cycle"><i class="icon iconfont icon-gouxuan"></i></div>
                                <div class="line"></div>
                            </div>
                        </div>

                    <?php elseif($oOrder->status != $oOrder::STATUS_FIVE): ?>
                        <div class="item">
                            <p>待付款</p>
                            <div class="item-cycle clearfix">
                                <div class="line"></div>
                                <div class="cycle"><i class="icon iconfont icon-gouxuan"></i></div>
                                <div class="line"></div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if(in_array($oOrder->status, [$oOrder::STATUS_TWO, $oOrder::STATUS_FOUR]) ): ?>
                        <div class="item active">
                            <p>已释放</p>
                            <div class="item-cycle clearfix">
                                <div class="line"></div>
                                <div class="cycle"><i class="icon iconfont icon-gouxuan"></i></div>
                                <div class="line"></div>
                            </div>
                        </div>
                    <?php elseif($oOrder->status != $oOrder::STATUS_FIVE && $oOrder->status != $oOrder::STATUS_SIX): ?>
                        <div class="item">
                            <p>待释放</p>
                            <div class="item-cycle clearfix">
                                <div class="line"></div>
                                <div class="cycle"><i class="icon iconfont icon-gouxuan"></i></div>
                                <div class="line"></div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if($oOrder->status == $oOrder::STATUS_SIX): ?>
                        <div class="item active">
                            <p>申诉中</p>
                            <div class="item-cycle clearfix">
                                <div class="line"></div>
                                <div class="cycle"><i class="icon iconfont icon-gouxuan"></i></div>
                                <div class="line"></div>
                            </div>
                        </div>

                    <?php endif; ?>

                    <?php if($oOrder->status == $oOrder::STATUS_FIVE): ?>
                        <div class="item active">
                            <p>已关闭</p>
                            <div class="item-cycle clearfix">
                                <div class="line"></div>
                                <div class="cycle"><i class="icon iconfont icon-gouxuan"></i></div>
                                <div class="line vhide"></div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if($oOrder->status == $oOrder::STATUS_FOUR): ?>
                        <div class="item active">
                            <p>交易完成</p>
                            <div class="item-cycle clearfix">
                                <div class="line"></div>
                                <div class="cycle"><i class="icon iconfont icon-gouxuan"></i></div>
                                <div class="line vhide"></div>
                            </div>
                        </div>

                    <?php elseif($oOrder->status != $oOrder::STATUS_FIVE): ?>
                        <div class="item">
                            <p>交易完成</p>
                            <div class="item-cycle clearfix">
                                <div class="line"></div>
                                <div class="cycle"><i class="icon iconfont icon-gouxuan"></i></div>
                                <div class="line vhide"></div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="table-info mt10">
                <table>
                    <tr>
                        <td><label class="font-c666">交易金额：</label>
                            <span><i class="cRed"><?php echo e($oOrder->amount); ?></i> CNY</span>
                        </td>
                        <td><label class="font-c666">银行卡：</label>

                            <span>
                 <?php if(isset($aUserPaymentAccounts['Bank'])): ?>
                                    <?php echo e($aUserPaymentAccounts['Bank']['account_name']); ?>   <?php echo e($aUserPaymentAccounts['Bank']['bank_address']); ?>

                                    <br>
                                    <?php if(in_array($oOrder->status, [$oOrder::STATUS_FIVE, $oOrder::STATUS_TWO])): ?>
                                        <?php echo e(MyString::maskString($aUserPaymentAccounts['Bank']['account_number'], 4)); ?>

                                    <?php else: ?>
                                        <?php echo e($aUserPaymentAccounts['Bank']['account_number']); ?>

                                    <?php endif; ?>
                                <?php else: ?>
                                    暂无银行卡支付配置
                                <?php endif; ?>
        </span>
                        </td>
                        <td>
                            <label class="font-c666">
                                付款附言：
                            </label>
                            <b class="bNum"><?php echo e($oOrder->postscript); ?></b>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="font-c666">数量：</label>
                            <span><?php echo e($oOrder->quantity); ?> BTC</span>
                        </td>
                        <td>
                            <label class="font-c666">支付宝：</label>
                            <span>

                <?php if(isset($aUserPaymentAccounts['Alipay'])): ?>
                                    <?php echo e($aUserPaymentAccounts['Alipay']['account_name']); ?>

                                    <br>
                                    <?php if(in_array($oOrder->status, [$oOrder::STATUS_FIVE, $oOrder::STATUS_TWO])): ?>
                                        <?php echo e(MyString::maskString($aUserPaymentAccounts['Alipay']['account_number'], 3)); ?>

                                    <?php else: ?>
                                        <?php echo e($aUserPaymentAccounts['Alipay']['account_number']); ?>

                                    <?php endif; ?>

                                <?php else: ?>
                                    暂无支付宝支付配置
                                <?php endif; ?>
            </span>
                            <?php if(isset($aUserPaymentAccounts['Alipay']['pay_qrcode'])): ?>
                                <i class="icon iconfont icon-qr-code">
            <span class="qr-big">
                <i></i>
                <img src="<?php echo e(env("STATIC_RES_URL")); ?>/<?php echo e($aUserPaymentAccounts['Alipay']['pay_qrcode']); ?>">
            </span>
                                </i>
                            <?php endif; ?>
                        </td>
                        <td rowspan="2">
                            <label class="font-c666">支付说明：</label>
                            <span>
            请务必将上面附言备注在付款信息中，便于<br>
            收款方确认款项
        </span>
                        </td>
                    </tr>
                    <tr>
                        <td><label class="font-c666">价格：</label>
                            <span><i class="cRed"><?php echo e($oOrder->price); ?></i> CNY/BTC</span></td>
                        <td>
                            <label class="font-c666">微信：</label>
                            <span>
                <?php if(isset($aUserPaymentAccounts['Wechat'])): ?>
                                    <?php echo e($aUserPaymentAccounts['Wechat']['account_name']); ?>

                                    <br>
                                    <?php if(in_array($oOrder->status, [$oOrder::STATUS_FIVE, $oOrder::STATUS_TWO])): ?>
                                        <?php echo e(MyString::maskString($aUserPaymentAccounts['Wechat']['account_number'], 3)); ?>

                                    <?php else: ?>
                                        <?php echo e($aUserPaymentAccounts['Wechat']['account_number']); ?>

                                    <?php endif; ?>
                                <?php else: ?>
                                    暂未添加微信账号
                                <?php endif; ?>
                </span>
                            <?php if(isset($aUserPaymentAccounts['Wechat']['pay_qrcode'])): ?>
                                <i class="icon iconfont icon-qr-code">
            <span class="qr-big">
                <i></i>
                <img src="<?php echo e(env("STATIC_RES_URL")); ?>/<?php echo e($aUserPaymentAccounts['Wechat']['pay_qrcode']); ?>">
            </span>
                                </i>
                            <?php endif; ?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="od-btns">
                <?php if($oUser->id == $oOrder->buyer_id): ?>
                    <?php if($oOrder->status == $oOrder::STATUS_ONE): ?>
                        <a class="yb-btn mr20" href="javascript:;" id="J_confirm_pay">我已付款</a>
                        <a class="yb-btn blue" href="javascript:;" id="J_cancel">取消交易</a>
                    <?php endif; ?>
                    <?php if($oOrder->status == $oOrder::STATUS_THREE ): ?>
                        <a class="yb-btn green" href="javascript:;" id="J_appeal">我要申诉</a>
                    <?php endif; ?>
                <?php elseif($oUser->id == $oOrder->seller_id): ?>
                    <?php if($oOrder->status == $oOrder::STATUS_THREE): ?>
                        <a class="yb-btn greenBg mr25" href="javascript:;" id="J_release">释放BTC</a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <div class="instructions pb10 pt20">
                <p>1、买方的汇款将直接进入卖方账户，交易过程中卖方出售的数字货币由亚币平台托管保护。</p>
                <p>2、请在规定时间内完成付款，并务必点击“我已付款”，卖方确认收款后，系统会将数字资产划转到您的账户。</p>
                <p>3、买方当日连续3笔或累计6笔取消，会限制当天的买入功能。</p>
                
            </div>
            <!--聊天-->
            <div class="chat">
                <div class="tabs chat-top clearfix">
                    <a class="left active" href="javascript:">聊天</a>
                    <a class="right" href="javascript:"><?php if($oUser->id == $oOrder->buyer_id): ?>
                            卖家信息 <?php elseif($oUser->id == $oOrder->seller_id): ?>买家信息 <?php endif; ?></a>
                </div>
                <div class="tabs-content chat-content">
                    <div>
                        <div class="chat-wrap">
                            <div class="chats">
                                <div class="warning">请通过亚币联系交易方，保证您交易的安全性 <i
                                            class="cancel icon iconfont icon-quxiao"></i></div>
                                <div class="scroll" id="J_msg-box">
                                    
                                </div>
                            </div>
                            <div class="chat-input">
                                <div class="tools">
                                    <a class="icon iconfont icon-icons01 upload" id="J_upload-chat-pic"
                                       href="javascript:;"></a>
                                </div>
                                <div class="input clearfix">
                                    <textarea placeholder="说点什么吧"
                                              id="J_chat-text"></textarea>
                                </div>
                                <div class="btns">
                                    <a class="yb-btn" id="J_send-message" href="javascript:;">发送</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if($oUserAllInfo): ?>
                        <div style="display: none" class="info-wrap">
                            <table class="tb-info">
                                <tr>
                                    <td>
                                        <?php if(!empty($oUserAllInfo->avatar)): ?>
                                            <img src="<?php echo e(env("STATIC_RES_URL")); ?>/<?php echo e($oUserAllInfo->avatar); ?>" alt="">
                                        <?php else: ?>
                                            <img src="<?php echo e(env("DEFAULT_AVATAR")); ?>" alt="">
                                        <?php endif; ?>
                                    </td>
                                    <td class="pl20" colspan="2">
                                        <b><?php echo e($oUserAllInfo->nickname); ?></b>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="m">交易量：<i
                                                class="cRed"><?php echo e($oUserAllInfo->ext_info->total_quantity ?   $oUserAllInfo->ext_info->total_quantity : '暂无'); ?>

                                            +BTC</i></td>
                                    <td class="r">电子邮箱：
                                        <?php if($oUserAllInfo->bind_email): ?>
                                            <i class="yz pass">已验证</i>
                                        <?php else: ?>
                                            <i class="yz">未验证</i>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="m">
                                        已确认的交易次数：<i
                                                class="cRed"><?php echo e($oUserAllInfo->ext_info->total_number ? $oUserAllInfo->ext_info->total_number:'暂无'); ?></i>
                                    </td>
                                    <td class="r">电话号码：
                                        <?php if($oUserAllInfo->bind_tel): ?>
                                            <i class="yz pass">已验证</i>
                                        <?php else: ?>
                                            <i class="yz">未验证</i>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </table>
                            <div class="split"></div>
                            <table class="tb-log">
                                <tr>
                                    <td class="l">
                                        第一次购买： <?php echo e($oUserAllInfo->first_order ? $oUserAllInfo->first_order->created_at:  '暂无'); ?>

                                    </td>
                                    <td class="m">
                                        信任数：<i class="cBlue"><?php echo e($oUserAllInfo->ext_info->trust_number ? $oUserAllInfo->ext_info->trust_number : '暂无'); ?></i>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="l">用户创建时间：<?php echo e($oUserAllInfo->created_at); ?></td>
                                </tr>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!--弹窗--释放BTC弹窗内容-->
    <div class="popup sellpop" id="J_release-pop">
        <div class="text">
            请确认是否收到订单号<span class="cBlue">#<?php echo e($oOrder->order_number); ?></span>，金额 <span class="cRed"><?php echo e($oOrder->amount); ?>

                CNY</span> 的付款？
            如果您未收到对方的付款，请勿释放BTC。
        </div>
        <div class="form mt10">
            <label>资金密码</label>
            <div class="sp-input-wrap">
                <input class="yb-input" type="password" id="J_cash_password">
            </div>
            <p style="display: none" class="remark cRed"><i class="iconfont icon-gantanhao vm mr5"></i><span class="vm">资金密码错误</span>
            </p>
        </div>
    </div>

    <!--弹窗--申诉弹窗内容-->
    <div class="popup shensupop" id="J_appeal-pop">
        <p>您确定前往申诉中心吗？</p>
        <p>请准备好<span class="cRed">付款回执</span>和<span class="cRed">交易相关信息</span>，<span>亚币的工作</span></p>
        <p>人员将介入申诉处理。</p>
    </div>

    <!--弹窗--取消弹窗内容-->
    <div class="popup shensupop" id="J_cancel-pop">
        <p>您确定取消该订单吗？</p>
        <p><span class="cRed">执行此操作将取消订单，且不可恢复！</span></p>
    </div>

    <!--弹窗--付款确认-->
    <div class="popup shensupop" id="J_confirm-pay-pop">
        <p>您确定已经付款成功吗？</p>
        <p><span class="cRed">如没有付款成功，你点此确认付款，将影响你在本平台信誉！</span></p>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection("script"); ?>
    <script id="J_him-msg" type="text/html">
        <div class="chat-text him clearfix">
            <div class="wrap clearfix">
                <img src="<% d.avatar %>" alt="<% d.name %>">
                <div class="box">
                    <i class="arrow icon iconfont icon-zhijiao-r"></i>
                    <% d.message %>
                </div>
            </div>
        </div>
    </script>

    <script id="J_me-msg" type="text/html">
        <div class="chat-text me clearfix">
            <div class="wrap clearfix">
                <img src="<% d.avatar %>" alt="<% d.name %>">
                <div class="box">
                    <i class="arrow icon iconfont icon-zhijiao-r"></i>
                    <% d.message %>
                </div>
            </div>
        </div>
    </script>
    <script id="J_system-msg" type="text/html">
        <div class="text">
            <span><% d.message %></span>
        </div>
    </script>

    <script id="J_ajax-msg" type="text/html">

        <%#  layui.each(d, function(index, item){  %>

        <%# if(item.showtime === 1) { %>
        <div class="time">
            <span> <% item.time_display %></span>
        </div>
        <%# } %>

        <%# if(item.tag === 'system') { %>
        <div class="text">
            <span><% item.content %></span>
        </div>
        <%# } else { %>

        <%# if(item.is_mine !== 1) { %>
        <div class="chat-text him clearfix">
            <%# } else { %>
            <div class="chat-text me clearfix">
                <%# } %>

                <div class="wrap clearfix">
                    <img src="<% item.from_avatar %>" alt="<% item.from_nickname %>">
                    <div class="box">
                        <i class="arrow icon iconfont icon-zhijiao-r"></i>
                        <% item.content %>
                    </div>
                </div>
            </div>

            <%# } %>
            <%# }); %>

    </script>

    <?php echo e(script('countdown')); ?>

    <?php echo e(script('reconnecting-websocket')); ?>

    <script type="application/javascript">
        layui.use(['layer', 'laytpl', 'upload'], function () {
            var layer = layui.layer;
            var laytpl = layui.laytpl;
            var upload = layui.upload;

            //定义模板的开始和结束标记
            laytpl.config({
                open: '<%',
                close: '%>'
            });

            //IM
            if (window.WebSocket || window.MozWebSocket) {
                var iChatUserId = "<?php echo e($oUser->id); ?>";
                var iChatToUserId = "<?php echo e($oUser->id == $oOrder->buyer_id ? $oOrder->seller_id : $oOrder->buyer_id); ?>"
                var oMsgBox = $("#J_msg-box");
                var oType = {'init_user': 1, 'new': 2};
                var oMsgContentType = {'text': 0, 'voice': 1};
                var oTipsMessage = {
                    'init': '初始化用户信息,缓存到local',
                    'not_online': '对方不在线!',
                    'system_error': 'system  error!',
                    'connect_close': 'Connection closed.',
                    'send_button_tip': 'Enter 发送 , Ctrl+Enter 换行',
                    'upload_error': 'Upload  Error!',
                    'webseockt_support_error': '您的浏览器不支持WebSocket，请使用Chrome/FireFox/Safari/IE10浏览器',
                    'send_msg_empty': '输入点什么吧！',
                    'send_msg_to_long': '输入内容长度不超过300个字符！'
                };
                var sSubProtocols = 'chat';
                var oHimMsgTpl = $("#J_him-msg");
                var oMeMsgTpl = $("#J_me-msg");
                var oAjaxMsgTpl = $("#J_ajax-msg");
                var oSystemMsgTpl = $("#J_system-msg");
                var oChatInputText = $("#J_chat-text");
                var oSendButton = $("#J_send-message");
                var sOrderNumber = "<?php echo e($oOrder->order_number); ?>";
                var sUploadChatPicButton = "#J_upload-chat-pic";
                var sChatUploadUrl = "<?php echo e(route('file-processes.upload', ['chat'])); ?>";
                var sCsrfToken = "<?php echo e(csrf_token()); ?>";
                var sChatLogHistoryUrl = "<?php echo e(route('chat-message-log.log-list')); ?>";
                var sUserKey = "my-info:";
                var bDebug = true;


                var ws = new ReconnectingWebSocket(SysConst.WEB_SOCKET_SERVER, sSubProtocols);
                ws.onopen = function (event) {
                    if (bDebug) {
                        console.log("【connection....】")
                    }

                    var json = {
                        "token": SysConst.WEB_SOCKET_TOKEN,
                        "type": oType.init_user,
                        "user_id": iChatUserId,
                        "order_number": sOrderNumber
                    };
                    ws.send(JSON.stringify(json));
                };
                ws.onmessage = function (event) {
                    if (bDebug) {
                        console.log(event.data);
                    }
                    var response = JSON.parse(event.data)
                    switch (response.type) {
                        case 1:
                            //清除本地缓存
                            window.localStorage.clear();
                            var myInfo = {
                                "id": response.data.user_id,
                                "name": response.data.name,
                                "avatar": response.data.avatar,
                                "default_lang": response.data.default_lang,
                            };

                            //将JSON对象转化成字符串
                            var jsonMyInfo = JSON.stringify(myInfo);

                            //用localStorage保存转化好的的字符串
                            localStorage.setItem(sUserKey + response.data.user_id, jsonMyInfo);

                            if (bDebug) {
                                console.log("初始化用户信息,缓存到local");
                            }
                            break;
                        case 2:
                            switch (response.code) {
                                case '10001':
                                    layer.msg(oTipsMessage.not_online, {icon: 2})
                                    break;
                                case '20001':
                                    layer.msg(response.msg, {icon: 2})
                                    break;
                                case '20002':
                                    layer.msg(response.msg, {icon: 2})
                                    break;
                                default:
                                    var sMsgTpl = '';
                                    if (response.data.tag == "system") {//系统消息加载系统消息模板
                                        sMsgTpl = oSystemMsgTpl.html();
                                    } else {//用户消息加载用户消息模板
                                        sMsgTpl = oHimMsgTpl.html();
                                    }
                                    if (bDebug) {
                                        console.log(response.data.tag);
                                        console.log(sMsgTpl);
                                    }
                                    laytpl(sMsgTpl).render(response.data, function (html) {
                                        oMsgBox.append(html)

                                    });
                            }
                            break;
                        default:
                            layer.msg(oTipsMessage.system_error, {icon: 2})
                    }

                    //ws.close();
                };

                ws.onclose = function (event) {
                    if (bDebug) {
                        console.log("Connection closed.");
                    }

                };

                //xss 过滤
                var xssFilter = function (content) {
                    //支持的html标签
                    var html = function (end) {
                        return new RegExp('\\n*\\[' + (end || '') + '(pre|div|p|table|thead|th|tbody|tr|td|ul|li|ol|li|dl|dt|dd|h2|h3|h4|h5)([\\s\\S]*?)\\]\\n*', 'g');
                    };
                    content = (content || '').replace(/&(?!#?[a-zA-Z0-9]+;)/g, '&amp;')
                            .replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/'/g, '&#39;').replace(/"/g, '&quot;')
                            .replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/\x22/g, '&quot;').replace(/\x27/g, '&#39;')//XSS
                            .replace(/\s{2}/g, '&nbsp') //转义空格
                            .replace(/img\[([^\s]+?)\]/g, function (img) {  //转义图片
                                return '<img class="photos" src="' + img.replace(/(^img\[)|(\]$)/g, '') + '">';
                            })
                            .replace(/face\[([^\s\[\]]+?)\]/g, function (face) {  //转义表情
                                var alt = face.replace(/^face/g, '');
                                return '<img alt="' + alt + '" title="' + alt + '" src="' + faces[alt] + '">';
                            }).replace(/a\([\s\S]+?\)\[[\s\S]*?\]/g, function (str) { //转义链接
                                var href = (str.match(/a\(([\s\S]+?)\)\[/) || [])[1];
                                var text = (str.match(/\)\[([\s\S]*?)\]/) || [])[1];
                                if (!href) return str;
                                return '<a href="' + href + '" target="_blank">' + (text || href) + '</a>';
                            }).replace(html(), '\<$1 $2\>').replace(html('/'), '\</$1\>') //转移HTML代码
                            .replace(/\n/g, '<br>') //转义换行
                    return content;
                };

                /**
                 * 计算输入字符串长度
                 * @param  inputStr
                 * @returns  {number}
                 */
                var getByteLen = function (inputStr) {
                    var len = 0;
                    for (var i = 0; i < inputStr.length; i++) {
                        if (inputStr[i].match(/[^\x00-\xff]/ig) != null) //全角
                            len += 2; //如果是全角，占用两个字节
                        else
                            len += 1; //半角占用一个字节
                    }
                    return len;
                }

                //send message
                var sendMessage = function () {
                    var content = xssFilter(oChatInputText.val())
                    if (content == '') {
                        layer.msg(oTipsMessage.send_msg_empty, {icon: 2});
                        return false;
                    }

                    if (getByteLen(content) > 500) {
                        layer.msg(oTipsMessage.send_msg_to_long, {icon: 2});
                        return false;
                    }
                    var json = {
                        "token": SysConst.WEB_SOCKET_TOKEN,
                        "order_number": sOrderNumber,
                        "type": oType.new,
                        "user_id": iChatUserId,
                        "to_user_id": iChatToUserId,
                        "message": content,
                        "c_type": oMsgContentType.text
                    };

                    var myInfo = window.localStorage.getItem(sUserKey + iChatUserId)
                    var jsonMyInfo = JSON.parse(myInfo)
                    jsonMyInfo.message = content
                    jsonMyInfo.c_type = 0
                    var meMsgTpl = oMeMsgTpl.html()
                    laytpl(meMsgTpl).render(jsonMyInfo, function (html) {
                        oMsgBox.append(html)
                    });
                    ws.send(JSON.stringify(json));
                    oChatInputText.val("")
                }

                oChatInputText.keypress(function (event) {
                    var keycode = (event.keyCode ? event.keyCode : event.which);
                    if (event.ctrlKey && (keycode == 13 || keycode == 10)) {
                        $(this).val($(this).val() + "\r\n");
                    }
                    else if (keycode == '13' || keycode == 10) {
                        event.preventDefault();//避免回车换行
                        sendMessage()
                    }
                })

                oSendButton.mouseover(function () {
                    layer.tips(oTipsMessage.send_button_tip, $(this))
                }).click(sendMessage);


                //图片上传
                var uploadInst = upload.render({
                    elem: sUploadChatPicButton,  //绑定上传按钮
                    url: sChatUploadUrl,
                    method: 'post',
                    field: 'file',    //默认是file

                    accept: 'images',   //允许上传的文件类型
                    size: "<?php echo e($iUploadImgSizeLimit); ?>", 　　　　  //最大允许上传的文件大小 kb
                    auto: true, 　　　   //是否自动上传
                    drag: true, 　　　　//支持拖拽
                    data: {
                        "_token": sCsrfToken,
                    },
                    //执行上传后上传完毕的回调
                    done: function (res) {
                        if (res.state == "SUCCESS") {
                            oChatInputText.append("img[" + SysConst.STATIC_RES_URL + res.url + "]\n");
                        } else {
                            layer.msg(oTipsMessage.upload_error, {icon: 2})
                        }
                    },

                    //执行上传请求出现异常的回调
                    error: function (upload) {
                        layer.msg(oTipsMessage.upload_error, {icon: 2})
                    }


                });

            } else {
                layer.msg(oTipsMessage.webseockt_support_error, {icon: 2})
            }

            //初始化聊天记录
            $.ajax({
                url: sChatLogHistoryUrl,
                type: 'post',
                dataType: 'json',
                data: {
                    '_token': sCsrfToken,
                    'order_number': sOrderNumber
                },
                success: function (response) {
                    if (response.code != "0") {
                        layer.msg(res.msg, {icon: 2});
                    } else {
                        var ajaxMsgTpl = oAjaxMsgTpl.html()
                        laytpl(ajaxMsgTpl).render(response.data, function (html) {
                            oMsgBox.append(html)
                        });
                    }
                },
                error: function (response) {
                    layer.msg("网络错误", {icon: 2});
                }
            });

            //倒计时
            <?php if($oOrder->status == $oOrder::STATUS_ONE): ?>
                    new Countdown(document.getElementById('J_countdown'), {
                format: "hh小时mm分ss秒",
                lastTime: "<?php echo e($sOrderCancelDate); ?>"
            });
            <?php endif; ?>

            // 付款确认
            $("#J_confirm_pay").click(function () {
                layer.open({
                    title: '付款确认',
                    type: 1,
                    area: '540px',
                    closeBtn: 1, //不显示关闭按钮
                    content: $('#J_confirm-pay-pop'),
                    btn: ['确定', '再想想'],
                    yes: function (index, layero) {
                        $.ajax({
                            url: "<?php echo e(route('order.confirm-pay',[$oOrder->id])); ?>",
                            type: 'post',
                            dataType: 'json',
                            data: {
                                '_token': "<?php echo e(csrf_token()); ?>"
                            },
                            success: function (res) {
                                if (res.code != "0") {
                                    layer.msg(res.msg, {icon: 2});
                                } else {
                                    layer.close(index)
                                    layer.msg(res.msg, {icon: 1});
                                    setTimeout(function () {
                                        window.location.reload();
                                    }, 1000);
                                }
                            },
                            error: function (res) {
                                //alert(res);
                            }
                        });

                    }
                })
            });

            // 取消交易
            $("#J_cancel").click(function () {
                layer.open({
                    title: '取消交易',
                    type: 1,
                    area: '540px',
                    closeBtn: 1, //不显示关闭按钮
                    content: $('#J_cancel-pop'),
                    btn: ['确定', '再想想'],
                    yes: function (index, layero) {
                        $.ajax({
                            url: "<?php echo e(route('order.cancel',[$oOrder->id])); ?>",
                            type: 'post',
                            dataType: 'json',
                            data: {
                                '_token': "<?php echo e(csrf_token()); ?>"
                            },
                            success: function (res) {
                                if (res.code != "0") {
                                    layer.msg(res.msg, {icon: 2});
                                } else {
                                    layer.close(index)
                                    layer.msg(res.msg, {icon: 1});
                                    setTimeout(function () {
                                        window.location.reload();
                                    }, 1000);
                                }
                            },
                            error: function (res) {
                                //alert(res);
                            }
                        });

                    }

                })
            });

            // 释放
            $("#J_release").click(function () {
                layer.open({
                    title: '释放BTC',
                    type: 1,
                    area: '540px',
                    closeBtn: 1, //不显示关闭按钮
                    content: $('#J_release-pop'),
                    btn: ['确定', '我再想想'],
                    yes: function (index, layero) {

                        var cashPassword = $('#J_cash_password').val();
                        if (cashPassword == '') {
                            layer.tips("资金密码错误", $('#J_cash_password'))
                            return false;
                        }
                        $.ajax({
                            url: "<?php echo e(route('order.release',[$oOrder->id])); ?>",
                            type: 'post',
                            dataType: 'json',
                            data: {
                                'cash_password': cashPassword,
                                '_token': "<?php echo e(csrf_token()); ?>"
                            },
                            success: function (res) {
                                if (res.code != "0") {
                                    layer.msg(res.msg, {icon: 2});
                                } else {
                                    layer.close(index) // 关闭窗口
                                    layer.msg(res.msg, {icon: 1});
                                    setTimeout(function () {
                                        window.location.reload();
                                    }, 1000);
                                }
                            },
                            error: function (res) {
                                //alert(res);
                            }
                        });
                    }
                })
            });

            //申诉
            $("#J_appeal").click(function () {
                layer.open({
                    title: '    ',
                    type: 1,
                    area: '460px',
                    closeBtn: 1, //不显示关闭按钮
                    content: $('#J_appeal-pop'),
                    btn: ['确定', '关闭'],
                    yes: function (index, layero) {
                        window.location.href = "<?php echo e(route("order.index", [$oOrder->id])); ?>"
                        layer.close(index) // 关闭弹窗
                    }
                })
            });

            function refresh() {
                window.location.reload();
            }

            var refreshTime = parseInt("<?php echo e($iOrderTimeLimit); ?>");
            setTimeout('yb.reloadPage()', refreshTime * 1000); //单位:秒
        });

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>