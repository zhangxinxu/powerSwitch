/*!
 * powerSwitch.js by zhangxinxu(.com)
 * you can use powerSwitch to switch anything
*/

(function(window, $, undefined) {
	var isAnimation = typeof history.pushState == "function";
	// 一些方法
	$.powerSwitch = function(elements, options) {
		$(elements).powerSwitch(options);
	};
	$.extend($.powerSwitch, {
		getRelative: function(trigger, params) {
			trigger = $(trigger);

			// 没有数据源，回家带孩子
			if (trigger.length == 0) return $();
			
			// 元素数组
			var arrTarget = [], isMoreToOne = false;
			trigger.each(function(index, element) {
                var selector = $(this).attr(params.attribute) || ($(this).attr("href") || "").split("#")[1];
				if (selector && arrTarget[selector] != true)  {
					var target = $();
					if (/^\w+$/.test(selector)) {
						target = $("#" + selector);
						// 如果属性值作为id没有对应元素，就作为类名选择器使用
						if (target.length === 0) {
							target = $("." + selector);
						}
						// 如果类名选择器也没有对应的元素，作为选择器使用
						if (target.length === 0) {
							target = $(selector);
						}
					} else {
						// 纯选择器
						target = $(selector);
					}

					target.each(function(index, element) {
						arrTarget.push(element);	
					});					
					
					// 设置标志量，避免重复
					arrTarget[selector] = true;
				} else if (arrTarget[selector] == true) {
					isMoreToOne = true;
				}
            });
			
			// 顺便判断下是否是多对一的关系
			trigger.data("isMoreToOne", isMoreToOne);

			return $(arrTarget);			
		},
		animation: function(targetHide, targetShow, params) {
			var container = null;
			
			// 动画相关的几个小方法
			var funTransition = function(target, isReset) {
				var transform = "transform " + params.duration + "ms linear";
				if (isAnimation == false) return;
				// CSS3 transition设置
				if (isReset == true) {
					target.css("webkitTransition", "none").css("transition", "none");
					target.data("hasTransition", false);
				} else if (!target.data("hasTransition")) {
					target.css("webkitTransition", "-webkit-" + transform).css("transition", transform);
					target.data("hasTransition", true);
				}
			}, funTranslate = function(target, key, value) {
				// 偏移值设置
				var valueTransform = "translate"+ key +"("+ value +")";
				isAnimation? 
				target.css("webkitTransform", valueTransform).css("transform", valueTransform):
				target.css(key == "X"? { left: value }: { top: value });
			}, funTransform = function(target, key, value) {
				// 如果value是纯数值
				if (parseInt(value) === value) value += "px";
				// IE10+等现代浏览器
				if (isAnimation) {
					// CSS3驱动动画					
					funTransition(target);
					// 动画触发等
					funTranslate(target, key, value);
				} else {
					// IE6-IE9这些老弱病残
					// left/top
					target.animate(key == "X"? {
						left: value
					}: {
						top: value	
					}, params.duration);
				}
			};
			// 因为是万能切换，显然情况就比较复杂
			// 可以是列表元素动画，也可以是容器元素动画
			// 容器元素动画又分为两种，scroll和transform(IE6-9 left/top代替)，自动判断
			// 列表元素动画也有几种，transform, fade, 和slide(toggle模式下专用)
			// 根据是否有target这个参数，决定是容器动画还是列表动画
			// 为了智能，容器动画根据一定的机制自动判断动画类型，这在Carousel模式下很有用
			// 智能判断的条件是：params.animation == "auto"
			// 动画的终点值与动画类型相关
			// 列表元素动画使用百分比，是定制无需关心
			// 容器元素动画的最终位置通过"data-position"存储访问
			if ((targetShow && targetShow.length) || (targetHide && targetHide.length)) {
				// 列表动画
				// 一般用在选项卡，手风琴效果	
				// 有一些限制规则：
				// 1. 如果是多选模式，即一次可以有多个面板展开（手风琴效果），不支持transform移动动画
				//    因此，此时，无动画显示
				if (params.toggle == true && params.animation == "translate") {
					params.animation = "none";
				}
				
				switch (params.animation) {
					case "translate": {
						// 移动
						// 比较前后移动元素的索引大小确定前后位置，
						// 用来决定移动的方向
						var indexHide = targetHide.data("index"),
							indexShow = targetShow.data("index");
							
						var objDirection = {
							"vertical": "Y",
							"horizontal": "X"	
						};
						
						if (indexHide != undefined && indexShow != undefined) {
							// 确定动画起点或终点位置是正的100%还是负的100%
							// 根据显示的元素是否在即将隐藏元素的后面判断
							var hundred = ((indexHide < indexShow) * 2 - 1 ) * 100;
							if (params.autoTime > 0 && !params.container) hundred = 100;
							
							// 清除可能的transition
							// 因为动画的需要元素要改一下起始位置
							// 由于之前CSS3 transition的设置，这种位置变化会有动画效果，而我们需要的是瞬间移动（用户看不到的那种）
							funTransition(targetShow.show(), true);
							// 要显示的元素乾坤大挪移到我们希望的位置
							funTranslate(targetShow, objDirection[params.direction], hundred + "%");
							// 动画触发了，一个移走，一个移入
							setTimeout(function() {
								// console.log(targetShow.css("left"));
								funTransform(targetHide, objDirection[params.direction], -1 * hundred + "%");
								funTransform(targetShow, objDirection[params.direction], "0%");	
							}, 17);
							
						} else {
							// 索引缺失，直接显示隐藏
							targetHide.hide();
							targetShow.show();
						}
						
						break;
					}
					case "slide": {
						// 手风琴slideup/slidedown效果
						if (targetHide) targetHide.slideUp(params.duration);
						if (targetShow) targetShow.slideDown(params.duration);
						break;
					}
					case  "fade": {
						if (targetHide) targetHide.fadeOut(params.duration);
						if (targetShow) targetShow.fadeIn(params.duration);	
						break;
					}
					case  "visibility": {
						if (targetHide) targetHide.css("visibility", "hidden");
						if (targetShow) targetShow.css("visibility", "visible");
						break;
					}
					default: {						
						// "auto", "none" 或其他乱七八糟类型直接display显隐
						if (targetHide) targetHide.hide();
						if (targetShow) targetShow.show();
					}
				}				
			} else if (params.container && params.container.length) {
				var position = params.container.data("position");
				container = params.container.get(0);
				
				// 容器动画
				// 各种模式都可能出现
				// 以下为各种动画类型的条件处理
				if (params.direction == "vertical") {
					// 根据容器是否存在滚动高度
					if (container.scrollHeight - container.clientHeight >= Math.max(position.top, 1)) {
						// scroll模式
						params.animation == "auto"? 
							params.container.animate({scrollTop: position.top}):
							params.container.scrollTop(position.top);
					} else {
						// transform模式
						params.animation == "auto"? 
							funTransform(params.container, "Y", -1 * position.top):
							params.container.css("top", -1 * position.top);
					}
				} else {
					// 水平方向							
					if (container.scrollWidth - container.clientWidth >= Math.max(position.left, 1)) {
						// scroll模式
						params.animation == "auto"? 
							params.container.animate({"scrollLeft": position.left}):
							params.container.scrollLeft(position.left);
					} else {
						// transform模式
						params.animation == "auto"? 
							funTransform(params.container, "X", -1 * position.left):
							params.container.css("left", -1 * position.left);
					}
				}
			}			
		}
	});
	
	$.fn.powerSwitch = function(options) {
		// 默认参数
		var defaults = {
			direction: "horizontal",
			eventType: "click",   // 其他可选参数：hover
			classAdd: "",         // 如果没有样式变化，请使用任意类名代替
			classRemove: "",
			classPrefix: "",      // eg. "prefix" → prefix_disabled, prefix_prev, prefix_play, prefix_pause, prefix_next
			attribute: "data-rel",
			animation: "auto",	  // 其他可选值："none|display", "visibility", "translate", "fade", "slide"
			duration: 250,        // 动画持续时间，单位毫秒
			container: null,
			autoTime: 0,          // 自动播放时间
			number: "auto",       // 每次切换的数目
			hoverDelay: 200,
			toggle: false,
			onSwitch: $.noop
		};
		// 最终参数
		var params = $.extend({}, defaults, options || {});
		
		// 一些全局类名
		
		$.each(["disabled", "previous", "play", "pause", "next"], function(index, key) {
			var paramsKey = "class" + key.slice(0, 1).toUpperCase() + key.slice(1);			
			params[paramsKey] = params[paramsKey] || (params.classPrefix? [params.classPrefix, key].join("_"): key);
		});
		
		
		// 一些全局变量 some global variables
		// 选中的触发项 the selected item
		var indexSelected = params.indexSelected || -1,
			numSwitch = parseInt(params.number) || 1,
		// hover延时处理的计时器 the timer for hover delay
		hoverTimer = null,
		// 自动播放的定时器
		autoPlayTimer = null,
		// 切换主体元素们
		eleRelatives = $(),
		// 主体元素的长度
		lenRelatives = 0;
		
		
		// 据说搞个变量速度更快~
		var self = $(this);
		
		// 无触发源，两种可能性
		// 1. 选择器挂掉了
		// 2. 单纯的自动播放，例如滚动新闻功能
		if (self.length == 0) {			
			// 如果是情况1，直接回家
			if (params.container == null || params.autoTime == 0) return self;
		}
		
		eleRelatives = $.powerSwitch.getRelative(self, params);

		if ((lenRelatives = eleRelatives.length) == 0) return self;
		
		// 确定indexSelected
		// 只有当未设定，或者不是toggle模式的时候
		if (indexSelected == -1 && params.toggle == false) {
			if (params.classAdd) {
				// 通过添加类名确定
				self.each(function(index, element) {
					if (indexSelected != -1) return;
                   	if ($(element).hasClass(params.classAdd)) indexSelected = index;
                });	
			} else {
				// 通过关联面板的显隐确定
				eleRelatives.each(function(index, element) {
					if (indexSelected != -1) return;
					if (params.animation == "visibility") {
						if ($(element).css("visibility") != "hidden") indexSelected = index;
					} else if ($(element).css("display") != "none") {
						indexSelected = index;
					}
				});	
			}
		}
		
		var isMoreToOne = false, elePrev = $(), eleNext = $();
		var funStatePrevNext = function(indexWill) {
			// 后退按钮的状态
			if (indexWill <= 0) {
				elePrev.addClass(params.classDisabled).removeAttr("title").attr("disabled", "disabled");
			} else {
				elePrev.removeClass(params.classDisabled).attr("title", elePrev.data("title")).removeAttr("disabled");
			}
			// 前进按钮的状态
			// 规则如下：
			// (总条目 - indexSelected位置值) / 每次切换的条数 是否大于 1
			if ((lenRelatives - indexWill) / numSwitch > 1) {
				eleNext.removeClass(params.classDisabled).attr("title", eleNext.data("title")).removeAttr("disabled");
			} else {
				eleNext.addClass(params.classDisabled).removeAttr("title").attr("disabled", "disabled");
			}
		}
		// 判断是否是多对一的关系
		if (self.eq(0).data("isMoreToOne") == true) {
			isMoreToOne = true;
			elePrev = self.eq(0), eleNext = self.eq(1);
			elePrev.data("title", elePrev.attr("title"));
			eleNext.data("title", eleNext.attr("title"));
			// 初始按钮的状态			
			funStatePrevNext(indexSelected);
			// 滚动位置
			if (indexSelected <= 0) {
				$(params.container).scrollLeft(0).scrollTop(0);
			}
		}
		// 判断是否1对多
		var isOneToMore = false;
		if (self.length == 1 && lenRelatives > 1) {
			isOneToMore = true;
		}
		

		var funSwitchable = function(indexWill) {
			// 总的切换项目数，每次切换的项目数
			var eleWillRelative = eleRelatives.slice(indexWill, indexWill + numSwitch);			
			var eleSelected = null, eleWillSelect = null, eleRelative = null;
			// 如果是toggle切换
			if (params.toggle == false) {
				// 在多对1模式下，我们关心的是触发按钮的临界状态	（disabled）等
				// 而不是选中与不选中的样式切换状态
				if (isMoreToOne == true) {
					// 偏移元素就是 eleWillRelative
					// 获取相对父元素的偏移
					var position = eleWillRelative.position();
					// 定位
					params.container = $(params.container);
					// 位置存储（动画终点位置）
					params.container.data("position", position);
					// 容器动画
					$.powerSwitch.animation(null, null, params);					
					// 按钮状态					
					funStatePrevNext(indexWill);
					
					// 回调
					params.onSwitch.call(this, eleWillRelative);
				} else if (isOneToMore == true) {
					// 1对多模式
					// 也存在按钮的临界状态
					// 只能显示，不能收起
					// 对应元素的显隐控制
					$.powerSwitch.animation(null, eleWillRelative, params);
					// 回调
					params.onSwitch.call(this, eleWillRelative);
				} else {					
					// 1 vs 1 或者 1 vs many情况下
					// 关心按钮选中与不选中的样子
					eleSelected = self.eq(indexSelected);
					eleWillSelect = self.eq(indexWill);
					eleRelative = eleRelatives.slice(indexSelected, indexSelected + numSwitch);	
					
					// 触发元素的类名状态改变
					eleWillSelect.addClass(params.classAdd).removeClass(params.classRemove);
					
					// 已选元素的改变
					eleSelected.addClass(params.classRemove).removeClass(params.classAdd);
					// 对应元素的显隐控制
					$.powerSwitch.animation(eleRelative, eleWillRelative, params);
					// 回调
					params.onSwitch.call(this, eleWillRelative, eleSelected, eleRelative);
					
				}
				indexSelected = indexWill;
			} else {
				// 如果多选
				// 如果只能展开
				// 能伸能屈
				if ((params.animation == "visibility" && eleWillRelative.css("visibility") == "hidden") ||
				(params.animation != "visibility" && eleWillRelative.css("display") == "none")) {
					// 显示
					$.powerSwitch.animation(null, eleWillRelative, params);	
					display = true;
				} else {
					$.powerSwitch.animation(eleWillRelative, null, params);
					display = false;
				}			
				// 回调
				params.onSwitch.call(this, eleWillRelative, display);
			}
		};

		
		// 遍历 loop
		var anchorSplit = location.href.split("#")[1];
		
		self.each(function(index, element) {
			// 存储索引
			// 存储title以及index
			$(element).data("index", index);
			
			if (isMoreToOne == true) {				
				$(element).bind("click", function() {
					var indexWill;
					if (!$(this).attr("disabled")) {
						if (index == 0) {
							indexWill = indexSelected - numSwitch;
							indexWill = Math.max(0, indexWill);
						} else if (index == 1) {
							indexWill = indexSelected + numSwitch;
							indexWill = Math.min(indexWill, lenRelatives - 1);
						}
						funSwitchable.call(this, indexWill);							
					}
					return false;
				});
			} else if (isOneToMore == true) {
				$(element).bind("click", function() {
					var indexWill;
					if (params.number == "auto") {
						numSwitch = lenRelatives;
					}	
					if (!$(this).attr("disabled")) {
						if (indexSelected == -1) {
							indexWill = 0;
						} else {
							indexWill = indexSelected + numSwitch;					
						}
						
						funSwitchable.call(this, indexWill);
						if (indexWill >= lenRelatives - 1) {
							$(this).addClass(params.classDisabled).attr("disabled", "disabled").removeAttr("title");		
						}
					}
					return false;
				});
			} else if (params.eventType == "click") {				
				$(element).bind("click", function() {
					// 点击事件 click events
					funSwitchable.call(this, index);
					return false;
				});
				
				if (anchorSplit && element.href && anchorSplit == element.href.split("#")[1]) {
					$(element).trigger("click");	
				}
			} else if (/^hover|mouseover$/.test(params.eventType)) {				
				$(element).hover(function() {
					// 鼠标经过 hover events
					clearTimeout(hoverTimer);
					hoverTimer = setTimeout(function() {
						funSwitchable.call(element, index);	
					}, parseInt(params.hoverDelay) || 0);
				}, function() {
					// 鼠标移开
					clearTimeout(hoverTimer);
				});
			}
        });
		
		eleRelatives.each(function(index, element) {
			$(element).data("index", index);	
		});
		
		// 自动播放
		var funPlayNext = function() {
			var indexWill = indexSelected + 1;
			if (indexWill >= lenRelatives) {
				indexWill = 0;
			}
			funSwitchable.call(self.get(indexWill), indexWill);
		}, funPlayPrev = function() {
			var indexWill = indexSelected - 1;
			if (indexWill < 0) {
				indexWill = lenRelatives -1;
			}
			funSwitchable.call(self.get(indexWill), indexWill);
		}, funAutoPlay = function() {
			clearTimeout(autoPlayTimer);
			if (funAutoPlay.flagAutoPlay == true) {
				autoPlayTimer = setTimeout(function() {
					funPlayNext();					
					funAutoPlay();								
				}, params.autoTime);
			}
		};
		
		
		if (params.autoTime && params.toggle == false) {			
			// 创建前进、后退、以及暂停按钮
			if (params.container) {
				var htmlTempOperate = '';
				self.length && $.each(["Previous", "Pause", "Next"], function(index, key) {
					// 自动播放模式时候需要
					htmlTempOperate = htmlTempOperate + '<a href="javascript:" class="'+ params["class" + key] +'" data-type="'+ key.toLowerCase() +'"></a>';	
				});
				
				params.container.append(htmlTempOperate).hover(function() {
					clearTimeout(autoPlayTimer);	
				}, function() {
					funAutoPlay();	
				}).delegate("a", "click", function() {
					var type = $(this).attr("data-type"), classType = params["class" + type.slice(0, 1).toUpperCase() + type.slice(1)],
						indexWill = indexSelected;
					switch (type) {
						case "previous": {
							funPlayPrev();
							break	
						}
						case "play": {
							funAutoPlay.flagAutoPlay = true;
							$(this).attr("data-type", "pause").removeClass(classType).addClass(params.classPause);
							funAutoPlay();
							break	
						}
						case "pause": {
							funAutoPlay.flagAutoPlay = false;
							$(this).attr("data-type", "play").removeClass(classType).addClass(params.classPlay);
							funAutoPlay();
							break	
						}
						case "next": {
							funPlayNext();
							break	
						}
					}
				});	
			}
			
			// 选项卡，以及切换面板鼠标经过停止自动播放
			self.each(function(index, element) {
				var relative = $.powerSwitch.getRelative(element, params);
                $(element).hover(function() {
					clearTimeout(autoPlayTimer);	
				}, function() {
					funAutoPlay();
				});
				relative.hover(function() {
					clearTimeout(autoPlayTimer);	
				}, function() {
					funAutoPlay();
				});
            });
			
			
			
			funAutoPlay.flagAutoPlay = true;
			funAutoPlay();
		}
		
		return self;
	};
})(window, jQuery);