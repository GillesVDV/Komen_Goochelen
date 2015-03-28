var OverzichtView = require('../views/OverzichtView.js');
var ProfielView = require('../views/ProfielView.js');
var BeoordeelView = require('../views/BeoordeelView.js');

var Application = Backbone.Router.extend({

	routes: {
		"overzicht": "overzicht",
		"profiel/:id": "profiel",
		"beoordelen/:id": "beoordelen",
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

	


});

module.exports = Application;