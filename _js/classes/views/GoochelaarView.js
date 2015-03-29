var template = require('../../../_hbs/goochelaar.hbs');
var currentdag;
var eindeweek;

var GoochelaarView = Backbone.View.extend({

	template: template,
	tagName: 'div',
	className: 'goochelaar',


	events: {
		'click .delete': 'clickDelete',
	},


	initialize: function(){

	},

	render: function(){
		this.$el.html(this.template(this.model.attributes));
		return this;
	}

});

module.exports = GoochelaarView;