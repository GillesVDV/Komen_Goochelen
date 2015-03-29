var template = require('../../../_hbs/beoordelen.hbs');
var Goochelaar = require('../models/Goochelaar.js');
var Baseview = require('./Baseview.js');
var GoochelaarCollection = require('../collections/GoochelaarCollection.js');
var beoordeler_id;
var user_id;
var teller = 0;
var scorekaart = document.querySelector('.scorekaart');
var totaalscore=0;


var BeoordeelView = Baseview.extend({

	template: template,
	tagName: 'div',
	className: 'scoreback',

	events: {
		'click .verder': 'clickAdd',
		'click .verder1': 'clickAddMain',
		'click .klaar': 'clickAddFinale',
		'click .scoredown': 'scoredown',
		'click .scoreup': 'scoreup'
	},

	initialize: function(options){
		_.extend(this.events, Baseview.prototype.events);

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
	},

	scoreup: function(e){
		e.preventDefault();
		teller++;
		var scoredown = document.querySelector('.scoredown').style.display='block';

		var getal = document.querySelector('.scorekaart p');
		var top = document.querySelector('.top');
		var bottom = document.querySelector('.bottom');
		getal.innerHTML = teller;
		top.innerHTML = teller;
		bottom.innerHTML = teller;

		if(teller >= 10){
			var scoreupbtn = document.querySelector('.scoreup').style.display='none';
		}
	},

	scoredown: function(e){

		e.preventDefault();
		teller--;

		var scoreup = document.querySelector('.scoreup').style.display='block';

		var getal = document.querySelector('.scorekaart p');
		var top = document.querySelector('.top');
		var bottom = document.querySelector('.bottom');
		getal.innerHTML = teller;
		top.innerHTML = teller;
		bottom.innerHTML = teller;

		if(teller <= 0){
			var scoredown = document.querySelector('.scoredown').style.display='none';
		}
	},

	clickAdd: function(e){

		e.preventDefault();

		console.log(teller);


			var intro = document.querySelector('.intro');
			var main = document.querySelector('.main');
			var introb = document.querySelector('.introb');
			var mainb = document.querySelector('.mainb');
			var getal = document.querySelector('.scorekaart p');
			var top = document.querySelector('.top');
			var bottom = document.querySelector('.bottom');

			totaalscore += teller;
			
			getal.innerHTML = 0;
			top.innerHTML = 0;
			bottom.innerHTML = 0;
			teller = 0;
	    	
	    	var scorekaart = document.querySelector('.scorekaart');
	    	scorekaart.classList.remove("schoppen");
	    	scorekaart.classList.add("ruiten");

	    	scorekaart.style.opacity = 0;
	    	$( ".scorekaart" ).animate({
			opacity: 1,

			}, 1000, function() {

			});

			intro.classList.add("hidden");
			main.classList.remove("hidden");

			introb.classList.add("hidden");
			mainb.classList.remove("hidden");
	},

	clickAddMain: function(e){

		e.preventDefault();

		console.log(teller);

			var main = document.querySelector('.main');
			var finale = document.querySelector('.finale');
			var mainb = document.querySelector('.mainb');
			var finaleb = document.querySelector('.finaleb');
			var getal = document.querySelector('.scorekaart p');
			var top = document.querySelector('.top');
			var bottom = document.querySelector('.bottom');
			getal.innerHTML = 0;
			top.innerHTML = 0;
			bottom.innerHTML = 0;

			totaalscore += teller;

			var scorekaart = document.querySelector('.scorekaart');
			scorekaart.classList.remove("ruiten");
	    	scorekaart.classList.add("klaveren");

	    	scorekaart.style.opacity = 0;
	    	$( ".scorekaart" ).animate({
			opacity: 1,

			}, 1000, function() {

			});
	    	
	    	teller = 0;
			main.classList.add("hidden");
			finale.classList.remove("hidden");
			mainb.classList.add("hidden");
			finaleb.classList.remove("hidden");
	},

	clickAddFinale: function(e){

		e.preventDefault();
		totaalscore += teller;

		$.get('index.php?page=scoregeplaatst&userid='+user_id, function ( data ) {
		  

		    if(data[0]){
		    	console.log('er is data');

		    	var updatescore = +totaalscore + +data[0].totaalscore;

		    	$.post( "index.php?page=updatetotaalscore", { 
					updatescore: updatescore,
					userid: user_id
				})
				.done(function( data ) {
					
					totaalscore = 0;
					updatescore = 0;
					teller = 0;
			    	Window.Application.navigate('overzicht', {trigger:true});
				});


		    }else{
		    	console.log('er is geen data');

		    	$.post( "index.php?page=eerstetotaalscore", { 
					userid: user_id,
					totaalscore: totaalscore
				})
				.done(function( data ) {
					
					totaalscore = 0;
					updatescore = 0;
					teller = 0;
			    	Window.Application.navigate('overzicht', {trigger:true});
				});


		    }
		});

		
	},

	
	
});

module.exports = BeoordeelView;