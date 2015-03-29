var template = require('../../../_hbs/winner.hbs');
var currentdag;
var eindeweek;

var WinnerView = Backbone.View.extend({

	template: template,
	tagName: 'div',
	className: 'winner',


	initialize: function(){

		
	},

	render: function(){
		this.$el.html(this.template(this.model.attributes));
		return this;
	}

});

module.exports = WinnerView;