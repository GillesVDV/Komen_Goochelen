var Handlebars = require("hbsfy/runtime");
var Application = require("./classes/routers/Application.js");
var GoochelaarCollection = require("./classes/collections/GoochelaarCollection.js");


function init() {

	Window.Application = new Application();
	Backbone.history.start();

	var collection = new GoochelaarCollection({
		
	});
	collection.fetch();

}

init();