!function(){
    "use strict";
    var e=0,r={};
    function i(t){
        if(!t)
            throw new Error("No options passed to Waypoint constructor");
        if(!t.element)
            throw new Error("No element option passed to Waypoint constructor");
        if(!t.handler)
            throw new Error("No handler option passed to Waypoint constructor");
        this.key="waypoint-"+e,
        this.options=i.Adapter.extend({},i.defaults,t),
            this.element=this.options.element,
            this.adapter=new i.Adapter(this.element),
            this.callback=t.handler,
            this.axis=this.options.horizontal?"horizontal":"vertical",
            this.enabled=this.options.enabled,
            this.triggerPoint=null,
            this.group=i.Group.findOrCreate({
                name:this.options.group,axis:this.axis
            }),
            this.context=i.Context.findOrCreateByElement(this.options.context),
            i.offsetAliases[this.options.offset]&&(this.options.offset=i.offsetAliases[this.options.offset]),
            this.group.add(this),
            this.context.add(this),
            r[this.key]=this,e+=1
        }i.prototype.queueTrigger=function(t){
            this.group.queueTrigger(this,t)
        },
        i.prototype.trigger=function(t){
            this.enabled&&this.callback&&this.callback.apply(this,t)
        },i.prototype.destroy=function(){
            this.context.remove(this),
            this.group.remove(this),
            delete r[this.key]},
            i.prototype.disable=function(){
                return this.enabled=!1,this
            },i.prototype.enable=function(){
                return this.context.refresh(),
                this.enabled=!0,this
            },i.prototype.next=function(){
                return this.group.next(this)
            },i.prototype.previous=function(){
                return this.group.previous(this)
            },i.invokeAll=function(t){
                var e=[];
                for(var i in r)
                    e.push(r[i]);
                for(var o=0,n=e.length;o<n;o++)
                    e[o][t]()
            },i.destroyAll=function(){
                i.invokeAll("destroy")},
                i.disableAll=function(){
                    i.invokeAll("disable")
                },i.enableAll=function(){
                    i.invokeAll("enable")
                },i.refreshAll=function(){
                    i.Context.refreshAll()
                },i.viewportHeight=function(){
                    return window.innerHeight||document.documentElement.clientHeight
                },i.viewportWidth=function(){
                    return document.documentElement.clientWidth
                },i.adapters=[],
                i.defaults={
                    context:window,continuous:!0,enabled:!0,group:"default",horizontal:!1,offset:0
                },i.offsetAliases={
                    "bottom-in-view":function(){
                        return this.context.innerHeight()-this.adapter.outerHeight()
                    },"right-in-view":function(){
                        return this.context.innerWidth()-this.adapter.outerWidth()
                    }
                },window.Waypoint=i
            }(),function(){
                "use strict";function e(t){
                    window.setTimeout(t,1e3/60)
                }
                var i=0,o={},y=window.Waypoint,t=window.onload;
                function n(t){
                    this.element=t,this.Adapter=y.Adapter,this.adapter=new this.Adapter(t),this.key="waypoint-context-"+i,
                    this.didScroll=!1,this.didResize=!1,this.oldScroll={
                        x:this.adapter.scrollLeft(),y:this.adapter.scrollTop()
                    },this.waypoints={
                        vertical:{},horizontal:{}
                    },t.waypointContextKey=this.key,o[t.waypointContextKey]=this,i+=1,this.createThrottledScrollHandler(),this.createThrottledResizeHandler()
                }n.prototype.add=function(t){var e=t.options.horizontal?"horizontal":"vertical";this.waypoints[e][t.key]=t,this.refresh()},n.prototype.checkEmpty=function(){var t=this.Adapter.isEmptyObject(this.waypoints.horizontal),e=this.Adapter.isEmptyObject(this.waypoints.vertical);t&&e&&(this.adapter.off(".waypoints"),delete o[this.key])},n.prototype.createThrottledResizeHandler=function(){var t=this;function e(){t.handleResize(),t.didResize=!1}this.adapter.on("resize.waypoints",function(){t.didResize||(t.didResize=!0,y.requestAnimationFrame(e))})},n.prototype.createThrottledScrollHandler=function(){var t=this;function e(){t.handleScroll(),t.didScroll=!1}this.adapter.on("scroll.waypoints",function(){t.didScroll&&!y.isTouch||(t.didScroll=!0,y.requestAnimationFrame(e))})},n.prototype.handleResize=function(){y.Context.refreshAll()},n.prototype.handleScroll=function(){var t={},e={horizontal:{newScroll:this.adapter.scrollLeft(),oldScroll:this.oldScroll.x,forward:"right",backward:"left"},vertical:{newScroll:this.adapter.scrollTop(),oldScroll:this.oldScroll.y,forward:"down",backward:"up"}};for(var i in e){var o=e[i],n=o.newScroll>o.oldScroll?o.forward:o.backward;for(var r in this.waypoints[i]){var s=this.waypoints[i][r],a=o.oldScroll<s.triggerPoint,l=o.newScroll>=s.triggerPoint;(a&&l||!a&&!l)&&(s.queueTrigger(n),t[s.group.id]=s.group)}}for(var u in t)t[u].flushTriggers();this.oldScroll={x:e.horizontal.newScroll,y:e.vertical.newScroll}},n.prototype.innerHeight=function(){return this.element==this.element.window?y.viewportHeight():this.adapter.innerHeight()},n.prototype.remove=function(t){delete this.waypoints[t.axis][t.key],this.checkEmpty()},n.prototype.innerWidth=function(){return this.element==this.element.window?y.viewportWidth():this.adapter.innerWidth()},n.prototype.destroy=function(){var t=[];for(var e in this.waypoints)for(var i in this.waypoints[e])t.push(this.waypoints[e][i]);for(var o=0,n=t.length;o<n;o++)t[o].destroy()},n.prototype.refresh=function(){var t,e=this.element==this.element.window,i=e?void 0:this.adapter.offset(),o={};for(var n in this.handleScroll(),t={horizontal:{contextOffset:e?0:i.left,contextScroll:e?0:this.oldScroll.x,contextDimension:this.innerWidth(),oldScroll:this.oldScroll.x,forward:"right",backward:"left",offsetProp:"left"},vertical:{contextOffset:e?0:i.top,contextScroll:e?0:this.oldScroll.y,contextDimension:this.innerHeight(),oldScroll:this.oldScroll.y,forward:"down",backward:"up",offsetProp:"top"}}){var r=t[n];for(var s in this.waypoints[n]){var a,l,u,h,p=this.waypoints[n][s],c=p.options.offset,d=p.triggerPoint,f=0,w=null==d;p.element!==p.element.window&&(f=p.adapter.offset()[r.offsetProp]),"function"==typeof c?c=c.apply(p):"string"==typeof c&&(c=parseFloat(c),-1<p.options.offset.indexOf("%")&&(c=Math.ceil(r.contextDimension*c/100))),a=r.contextScroll-r.contextOffset,p.triggerPoint=f+a-c,l=d<r.oldScroll,u=p.triggerPoint>=r.oldScroll,h=!l&&!u,!w&&(l&&u)?(p.queueTrigger(r.backward),o[p.group.id]=p.group):!w&&h?(p.queueTrigger(r.forward),o[p.group.id]=p.group):w&&r.oldScroll>=p.triggerPoint&&(p.queueTrigger(r.forward),o[p.group.id]=p.group)}}return y.requestAnimationFrame(function(){for(var t in o)o[t].flushTriggers()}),this},n.findOrCreateByElement=function(t){return n.findByElement(t)||new n(t)},n.refreshAll=function(){for(var t in o)o[t].refresh()},n.findByElement=function(t){return o[t.waypointContextKey]},window.onload=function(){t&&t(),n.refreshAll()},y.requestAnimationFrame=function(t){(window.requestAnimationFrame||window.mozRequestAnimationFrame||window.webkitRequestAnimationFrame||e).call(window,t)},y.Context=n}(),function(){"use strict";function s(t,e){return t.triggerPoint-e.triggerPoint}function a(t,e){return e.triggerPoint-t.triggerPoint}var e={vertical:{},horizontal:{}},i=window.Waypoint;function o(t){this.name=t.name,this.axis=t.axis,this.id=this.name+"-"+this.axis,this.waypoints=[],this.clearTriggerQueues(),e[this.axis][this.name]=this}o.prototype.add=function(t){this.waypoints.push(t)},o.prototype.clearTriggerQueues=function(){this.triggerQueues={up:[],down:[],left:[],right:[]}},o.prototype.flushTriggers=function(){for(var t in this.triggerQueues){var e=this.triggerQueues[t],i="up"===t||"left"===t;e.sort(i?a:s);for(var o=0,n=e.length;o<n;o+=1){var r=e[o];(r.options.continuous||o===e.length-1)&&r.trigger([t])}}this.clearTriggerQueues()},o.prototype.next=function(t){this.waypoints.sort(s);var e=i.Adapter.inArray(t,this.waypoints);return e===this.waypoints.length-1?null:this.waypoints[e+1]},o.prototype.previous=function(t){this.waypoints.sort(s);var e=i.Adapter.inArray(t,this.waypoints);return e?this.waypoints[e-1]:null},o.prototype.queueTrigger=function(t,e){this.triggerQueues[e].push(t)},o.prototype.remove=function(t){var e=i.Adapter.inArray(t,this.waypoints);-1<e&&this.waypoints.splice(e,1)},o.prototype.first=function(){return this.waypoints[0]},o.prototype.last=function(){return this.waypoints[this.waypoints.length-1]},o.findOrCreate=function(t){return e[t.axis][t.name]||new o(t)},i.Group=o}(),function(){"use strict";var i=window.jQuery,t=window.Waypoint;function o(t){this.$element=i(t)}i.each(["innerHeight","innerWidth","off","offset","on","outerHeight","outerWidth","scrollLeft","scrollTop"],function(t,e){o.prototype[e]=function(){var t=Array.prototype.slice.call(arguments);return this.$element[e].apply(this.$element,t)}}),i.each(["extend","inArray","isEmptyObject"],function(t,e){o[e]=i[e]}),t.adapters.push({name:"jquery",Adapter:o}),t.Adapter=o}(),function(){"use strict";var n=window.Waypoint;function t(o){return function(){var e=[],i=arguments[0];return o.isFunction(arguments[0])&&((i=o.extend({},arguments[1])).handler=arguments[0]),this.each(function(){var t=o.extend({},i,{element:this});"string"==typeof t.context&&(t.context=o(this).closest(t.context)[0]),e.push(new n(t))}),e}}window.jQuery&&(window.jQuery.fn.waypoint=t(window.jQuery)),window.Zepto&&(window.Zepto.fn.waypoint=t(window.Zepto))}(),function(i){"use strict";i.fn.counterUp=function(t){var e=i.extend({time:400,delay:10},t);return this.each(function(){var l=i(this),u=e;l.waypoint(function(){var t=[],e=u.time/u.delay,i=l.text(),o=/[0-9]+,[0-9]+/.test(i);i=i.replace(/,/g,"");/^[0-9]+$/.test(i);for(var n=/^[0-9]+\.[0-9]+$/.test(i),r=n?(i.split(".")[1]||[]).length:0,s=e;1<=s;s--){var a=parseInt(i/e*s);if(n&&(a=parseFloat(i/e*s).toFixed(r)),o)for(;/(\d+)(\d{3})/.test(a.toString());)a=a.toString().replace(/(\d+)(\d{3})/,"$1,$2");t.unshift(a)}l.data("counterup-nums",t),l.text("0");l.data("counterup-func",function(){l.text(l.data("counterup-nums").shift()),l.data("counterup-nums").length?setTimeout(l.data("counterup-func"),u.delay):(l.data("counterup-nums"),l.data("counterup-nums",null),l.data("counterup-func",null))}),setTimeout(l.data("counterup-func"),u.delay)},{offset:"100%",triggerOnce:!0})})}}(jQuery);
