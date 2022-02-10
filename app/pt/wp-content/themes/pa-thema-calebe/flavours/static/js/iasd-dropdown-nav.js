(function($){

	var DropdownNavController = {
		init : function(){
			$this = $(this);
			$this.find('.dropdown-menu').bind('click', DropdownNavController.preventClosing);
			$this.find('ul > li > a').bind('click', DropdownNavController.openSubmenu);
			$this.find('.back-link').bind('click', DropdownNavController.closeSubmenu);
			$this.find('.dropdown-toggle').bind('click', DropdownNavController.updateDropdownHeight);
			
		},
				
		preventClosing : function(event) {
			event.stopPropagation();
		},

		updateDropdownHeight: function(event){
			var $dropdown = $(this).closest('.dropdown');
			var $openTarget = $dropdown.find('ul.active');

			//for some reason, click event on dropdown toggle happens before ul is visible
			//timeout needed to get the height.
			setTimeout(function(){ 
				$dropdown.find('.dropdown-menu').css('height', $openTarget.height());
			}, 15);
		},

		openSubmenu : function(event) {

			var $this = $(this);
			var submenuTarget = $this.closest('li').find('ul');
			submenuTarget.toggleClass('active');			
			if (submenuTarget.size()){
				DropdownNavController.updateDropdownHeight.apply(this);
				return false;	
			}
			
		},

		closeSubmenu : function() {
			var $this = $(this);
			var submenuTarget = $this.closest('ul');
			$this.closest('.dropdown-menu').css('height', '');
			submenuTarget.removeClass('active');
			return false;
		}		

	};

	$.fn.iasdDropdownNavigation = function(method){
		return this.each(function() {
 
 	        if (!method || typeof(method) == 'object'){
	        	DropdownNavController.init.apply(this);
 	        } else if (typeof(method) == 'string' && DropdownNavController[method]){
 	        	DropdownNavController[methd].apply(this, arguments.splice(1));
 	        }
 	    });
	};

}(jQuery));

jQuery(document).ready(function(){
	if ( jQuery.isFunction(jQuery.fn.iasdDropdownNavigation) ) {
		jQuery('.iasd-dropdown-navigation').iasdDropdownNavigation();
	}
});
