YAHOO.example = function() {
		var $D = YAHOO.util.Dom;
		var $E = YAHOO.util.Event;
		var $A = YAHOO.util.Anim;
		var $M = YAHOO.util.Motion;
		var $DD = YAHOO.util.DD;
		var $ = $D.get;
		var x = 1;
		return {
			init : function() {
				$E.on(['move-left','move-right'], 'click', this.move);
			},
			move : function(e) {
				$E.stopEvent(e);
				switch(this.id) {
					case 'move-left':
						if ( x === 1 ) {
							return;
						}
						var attributes = {
							points : {
								by : [400, 0]
							}
						};
						x--;
					break;
					case 'move-right':
						if ( x === 4 ) {
							return;
						}
						var attributes = {
							points : {
								by : [-400, 0]
							}
						};
						x++;
					break;
				};
				var anim = new $M('themes', attributes, 0.5, YAHOO.util.Easing.easeOut);
				anim.animate();
			}
		};
	}();
	YAHOO.util.Event.onAvailable('doc',YAHOO.example.init, YAHOO.example, true);
  
  /**
   * get the photo id then display image 
   */
  function get_image_id( photo_id, photo_title ) {
    var target_div = document.getElementById('real_image');
    var img_url = '<div>'+
    '<img src="'+photo_id+'" title="'+photo_title+'"/></div>';
    target_div.innerHTML = img_url;
   
    var title_div = document.getElementById('instructions');
    title_div.innerHTML = '<div>'+photo_title+'</div>';
  }
