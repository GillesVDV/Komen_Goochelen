var OverzichtView = require('../views/OverzichtView.js');

var Application = Backbone.Router.extend({

	routes: {
		"overzicht": "overzicht",
		"*actions": "default"
	},

	empty: function(){
		$('.container').empty();
	},

	default: function(){
		this.navigate('overzicht', {trigger: true});	
	},

	overzicht : function(){
		this.empty();
		this.overzicht = new OverzichtView();
		$('.container').append(this.overzicht.render().el);
	}

});

module.exports = Application;