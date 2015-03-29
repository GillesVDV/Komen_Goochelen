var Handlebars = require("hbsfy/runtime");
var Application = require("./classes/routers/Application.js");
var GoochelaarCollection = require("./classes/collections/GoochelaarCollection.js");

Handlebars.registerHelper('ifCond', function(v1, v2, options) {
  if(v1 === v2) {
    return options.fn(this);
  }
  return options.inverse(this);
});


function init() {

	Window.Application = new Application();
	Backbone.history.start();

	var collection = new GoochelaarCollection({
		
	});
	collection.fetch();

}

init();