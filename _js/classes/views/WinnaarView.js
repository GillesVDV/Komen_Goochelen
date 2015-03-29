var WinnaarsCollection = require('../collections/WinnaarsCollection.js');
var WinnerView = require('./WinnerView.js');

var Baseview = require('./Baseview.js');
var template = require('../../../_hbs/winnaars.hbs');


var WinnaarView = Baseview.extend({

	template: template,
	tagName: 'div',
	className: 'overview',

	initialize: function(){

		this.collection = new WinnaarsCollection();
		this.listenTo(this.collection, 'sync', this.renderGoochelaars);
		this.collection.fetch();

	},

	renderGoochelaars: function(){
		var self = this;
		this.$goochelaars.empty();

		$.get('index.php?page=getwinnaar', function ( data ) {
		    self.winnaar = data[0].email;
			
			self.collection.forEach(self.renderGoochelaar, self);

		});	
		
	},

	renderGoochelaar: function(model){

		if (model.get('email') == this.winnaar) {
	    	model.set({showWinnaar : true});
	    }

		var view = new WinnerView({
			model: model
		});
		this.$goochelaars.append(view.render().el);
	},


	render: function(){

		this.$el.html(this.template());
		this.$goochelaars = this.$el.find('.winnaars');
		return this;

	},

	


});

module.exports = WinnaarView;