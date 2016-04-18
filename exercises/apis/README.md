# WEB API exercises

## Exercise #1: Displaying hiking route

Create a map using the Google Maps API that displays a hiking route between a number of different locations. Use a terrain map. The [starter file](exercise1.html) initializes a map.

Hint: you will need to draw a polyline or polygon.

See the [W3C tutorial](http://www.w3schools.com/googleapi/google_maps_overlays.asp) or the [official Google Maps API documentation](https://developers.google.com/maps/documentation/javascript/) for help.

![Exercise1](images/exercise1.png)


## Exercise #2: Map of properties

Create a map using the Google Maps API that displays all the properties from the booking table using markers. When the user clicks on a marker, show the details of that property (photo, location, and description) in an info window.

  - You will need to use PHP to query the properties from MySQL and generate the map. We can simply use `Properties.class.php` from before for that.
  - You may extend the properties table with latitude and longitude columns.

![Exercise2](images/exercise2.png)


## Exercise #3: Plotting conference statistics

A certain professional organization runs a number of conferences. Our task is to create a webpage for them where users can plot historical statistics (number of submissions and acceptance rates) for conferences and compare them.

Specifically, the envisaged interface includes the following controls:
  - Conference selector (list of conferences with checkboxes)
  - Contribution selector (select list with the type of contributions: full papers, short papers, demonstrators)
  - Date selector: two select lists for specifying start and end years

A plot should then be generated, like this (just prettier):

![Exercise3](images/exercise3_sample.jpg)

  - Find a charting API for the task.
  - Figure out the best way to represent the data. (We probably want to use associative arrays in JavaScript.)
  - Implement the above functionality.

Some sample data to play with:
```
Year 	Submitted 	Accepted 	Rate
SIGIR '99 	135 	33 	24%
SIGIR '01 	201 	47 	23%
SIGIR '02 	219 	44 	20%
SIGIR '03 	266 	46 	17%
SIGIR '04 	267 	58 	22%
SIGIR '05 	368 	71 	19%
SIGIR '06 	399 	74 	19%
SIGIR '07 	490 	85 	17%
SIGIR '08 	497 	85 	17%
SIGIR '09 	494 	78 	16%
SIGIR '10 	520 	87 	17%
SIGIR '11 	543 	108 	20%
SIGIR '12 	483 	98 	20%
SIGIR '13 	366 	73 	20%
SIGIR '14 	387 	82 	21%
SIGIR '15 	351 	70 	20%

CIKM '05 	425 	77 	18%
CIKM '06 	537 	81 	15%
CIKM '07 	512 	86 	17%
CIKM '08 	772 	132 	17%
CIKM '09 	847 	123 	15%
CIKM '10 	945 	126 	13%
CIKM '11 	918 	228 	25%
CIKM '12 	1088 	146 	13%
CIKM '13 	848 	143 	17%
CIKM '14 	838 	175 	21%
CIKM '15 	646 	165 	26%

WSDM '08 	151 	24 	16%
WSDM '09 	170 	29 	17%
WSDM '10 	290 	45 	16%
WSDM '11 	372 	83 	22%
WSDM '12 	362 	75 	21%
WSDM '13 	387 	73 	19%
WSDM '14 	355 	64 	18%
WSDM '15 	238 	39 	16%
WSDM '16 	368 	67 	18%

```
