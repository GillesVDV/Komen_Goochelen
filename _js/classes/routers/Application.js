var OverzichtView = require('../views/OverzichtView.js');
var ProfielView = require('../views/ProfielView.js');
var BeoordeelView = require('../views/BeoordeelView.js');
var GalerijView = require('../views/GalerijView.js');
var WinnaarView = require('../views/WinnaarView.js');

var Application = Backbone.Router.extend({

	routes: {
		"overzicht": "overzicht",
		"profiel/:id": "profiel",
		"beoordelen/:id": "beoordelen",
		"winnaar": "winnaar",
		"galerij": "galerij",
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
	},

	profiel : function(id){
		this.empty();
		this.profiel = new ProfielView({
			id: id
		});
		$('.container').append(this.profiel.render().el); 
	},

	beoordelen : function(id){
		this.empty();
		this.beoordelen = new BeoordeelView({
			id: id
		});
		$('.container').append(this.beoordelen.render().el); 
	},

	winnaar : function(){
		this.empty();
		this.winnaar = new WinnaarView();
		$('.container').append(this.winnaar.render().el);
	},

	galerij : function(){
		this.empty();
		this.galerij = new GalerijView();
		$('.container').append(this.galerij.render().el);
	},



});

module.exports = Application;