var template = require('../../../_hbs/beoordelen.hbs');
var Goochelaar = require('../models/Goochelaar.js');
var GoochelaarCollection = require('../collections/GoochelaarCollection.js');
var beoordeler_id;
var user_id;

var BeoordeelView = Backbone.View.extend({

	template: template,
	tagName: 'section',
	className: 'detail',

	events: {
		'click .verder': 'clickAdd',
		'click .verder1': 'clickAddMain',
		'click .klaar': 'clickAddFinale'
	},

	clickAdd: function(e){

		e.preventDefault();

		$.post( "index.php?page=scoreeen", { 
			userid: user_id,
			beoordelerid: beoordeler_id,
			score: this.$el.find('input[name=intro]:checked').val(),
			feedback: this.$el.find('.feedbackintro').val()
		})
		.done(function( data ) {

			var intro = document.querySelector('.intro');
			var main = document.querySelector('.main');
	    	
			intro.classList.add("hidden");
			main.classList.remove("hidden");
		});
	},

	clickAddMain: function(e){

		e.preventDefault();

		$.post( "index.php?page=scoretwee", { 
			userid: user_id,
			beoordelerid: beoordeler_id,
			score: this.$el.find('input[name=main]:checked').val(),
			feedback: this.$el.find('.feedbackmain').val()
		})
		.done(function( data ) {

			var main = document.querySelector('.main');
			var finale = document.querySelector('.finale');
	    	
			main.classList.add("hidden");
			finale.classList.remove("hidden");


		});
	},

	clickAddFinale: function(e){

		e.preventDefault();

		$.post( "index.php?page=scoredrie", { 
			userid: user_id,
			beoordelerid: beoordeler_id,
			score: this.$el.find('input[name=finale]:checked').val(),
			feedback: this.$el.find('.feedbackfinale').val()
		})
		.done(function( data ) {
	    	Window.Application.navigate('overzicht', {trigger:true});
		});
	},

	initialize: function(options){

		$.get('index.php?page=session', function ( data ) {
		    beoordeler_id = data.id;
		});

		if(options && options.id){

			user_id = options.id;

			this.model = new Goochelaar();

			this.model.set('id', options.id);
			this.model.fetch({
				success: function(model, response){
					if(response.length === 0){
						Window.Application.navigate('overzicht', {trigger:true});
					}
				}
			});
			this.listenTo(this.model, "sync", this.render);

		}

	},

	render: function(){
		this.$el.html(this.template(this.model.attributes));

		return this;
	}
	
});

module.exports = BeoordeelView;