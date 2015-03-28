var template = require('../../../_hbs/goochelaar.hbs');

var GoochelaarView = Backbone.View.extend({

	template: template,
	tagName: 'div',
	className: 'goochelaar',


	events: {
		'click .delete': 'clickDelete',
	},

	clickDelete: function(e){
		e.preventDefault();

		this.model.destroy();

	},

	initialize: function(){
		this.listenTo(this.model, 'destroy', this.remove);
	},

	render: function(){
		this.$el.html(this.template(this.model.attributes));
		return this;
	}

});

module.exports = GoochelaarView;