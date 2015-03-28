

var Baseview = Backbone.View.extend({

	events: {
		'click .menubtn': 'menuOpen',
		'click .menuclose': 'menuClose'
	},

	initialize: function(){


	},

	menuOpen: function(e){
		e.preventDefault();
		var menu = document.querySelector('.menu');
		var cont = document.querySelector('.container');

		menu.classList.remove("folded");
		cont.classList.add("slidecont");

		document.querySelector('.menubtn').className = "menuclose";



	},
	menuClose: function(e){
		e.preventDefault();

		var menu = document.querySelector('.menu');
		var cont = document.querySelector('.container');

		menu.classList.add("folded");
		cont.classList.remove("slidecont");
		
		document.querySelector('.menuclose').className = "menubtn";

	},

	


});

module.exports = Baseview;