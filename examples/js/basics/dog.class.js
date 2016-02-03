/* Dog class - to be used in objects.html */

function Dog(name, weight, breed) {
    this.name = name;
    this.weight = weight;
    this.breed = breed;
}

function printInfo() {
    console.log("name:   " + this.name);
    console.log("weight: " + this.weight);
    console.log("breed:  " + this.breed);
}

Dog.prototype.info = printInfo;

var mydog = new Dog("Tiffy", 3.4, "mixed");
mydog.info();
