/*
 无缝滚动 HRwfgd
 @DOM
 <div id="marquee">
 <ul>
 <li></li>
 <li></li>
 </ul>
 </div>
 @CSS
 #marquee{width:200px;height:50px;overflow:hidden}
 @Usage
 $('#marquee').HRwfgd(options);
 @options
 isEqual			:true,		//所有滚动的元素长宽是否相等,true,false
 loop			:0,			//循环滚动次数，0时无限
 direction		:'left',	//滚动方向，'left','right','up','down'
 scrollAmount	:1,			//步长
 scrollDelay		:20			//时长
 */
$.fn.HRwfgd = function (options) {
    var opts = $.extend({}, {
        isEqual: true,
        loop: 0,
        direction: 'left',
        scrollAmount: 1,
        scrollDelay: 20
    }, options);
    this.each(function () {
        var $marquee = $(this);
        var _scrollObj = $marquee.get(0);
        var scrollW = $marquee.width();
        var scrollH = $marquee.height();
        var $element = $marquee.children();
        var $kids = $element.children();
        var scrollSize = 0;
        var _type = (opts.direction == 'left' || opts.direction == 'right') ? 1 : 0;
        $element.css(_type ? 'width' : 'height', 10000);
        if (opts.isEqual) {
            scrollSize = $kids[_type ? 'outerWidth' : 'outerHeight']() * $kids.length
        } else {
            //查询所有父容器，如果是隐藏的，将其显示
            $kids.parents().each(function () {
                if ($(this).is(":hidden")) {
                    $(this).addClass("hr_wfgd").show();
                }
            })
            $kids.each(function () {
                scrollSize += $(this)[_type ? 'outerWidth' : 'outerHeight']()
            })
            //计算完毕后，还原父容器到初始状态
            $(document).find(".hr_wfgd").each(function () {
                if ($(this).is(":visible")) {
                    $(this).hide().removeClass("hr_wfgd");
                }
            });
        }
        if (scrollSize < (_type ? scrollW : scrollH))
            return;
        $element.append($kids.clone()).css(_type ? 'width' : 'height', scrollSize * 2);
        var numMoved = 0;
        function scrollFunc() {
            var _dir = (opts.direction == 'left' || opts.direction == 'right') ? 'scrollLeft' : 'scrollTop';
            if (opts.loop > 0) {
                numMoved += opts.scrollAmount;
                if (numMoved > scrollSize * opts.loop) {
                    _scrollObj[_dir] = 0;
                    return clearInterval(moveId)
                }
            }
            if (opts.direction == 'left' || opts.direction == 'up') {
                _scrollObj[_dir] += opts.scrollAmount;
                if (_scrollObj[_dir] >= scrollSize) {
                    _scrollObj[_dir] = 0
                }
            } else {
                _scrollObj[_dir] -= opts.scrollAmount;
                if (_scrollObj[_dir] <= 0) {
                    _scrollObj[_dir] = scrollSize
                }
            }
        }
        var moveId = setInterval(scrollFunc, opts.scrollDelay);
        $marquee.hover(function () {
            clearInterval(moveId)
        },
                function () {
                    clearInterval(moveId);
                    moveId = setInterval(scrollFunc, opts.scrollDelay)
                })
    })
};

$(document).ready(function () {


    $("#wfgd1").HRwfgd({isEqual: false});
});