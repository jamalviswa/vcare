/** Graphs : Flot
	graphs-flot.html


		<!-- PAGE LEVEL SCRIPTS -->
		loadScript(plugin_path + "chart.flot/jquery.flot.min.js", function(){
			loadScript(plugin_path + "chart.flot/jquery.flot.resize.min.js", function(){
				loadScript(plugin_path + "chart.flot/jquery.flot.time.min.js", function(){
					loadScript(plugin_path + "chart.flot/jquery.flot.fillbetween.min.js", function(){
						loadScript(plugin_path + "chart.flot/jquery.flot.orderBars.min.js", function(){
							loadScript(plugin_path + "chart.flot/jquery.flot.pie.min.js", function(){
								loadScript(plugin_path + "chart.flot/jquery.flot.tooltip.min.js", function(){
								
									// demo js script
									loadScript("assets/js/view/demo.graphs.flot.js");

								});
							});
						});
					});
				});
			});
		});

		------------------------------------------------------------------------------------------

		01. SALES CHART
		02. SIN CHART
		03. BAR CHART
		04. BAR CHART HORIZONTAL
		05. PIE CHART
		06. STATS CHART
		07. REALTIME CHART
		http://www.flotcharts.org/flot/examples/

 ************************************************* **/
	jQuery(window).ready(function() {
		_flot();
	});


	function _flot() {

		/* DEFAULTS FLOT COLORS */
		var $color_border_color = "#eaeaea";		/* light gray 	*/
			$color_grid_color 	= "#dddddd"			/* silver	 	*/
			$color_main 		= "#E24913";		/* red       	*/
			$color_second 		= "#6595b4";		/* blue      	*/
			$color_third 		= "#FF9F01";		/* orange   	*/
			$color_fourth 		= "#7e9d3a";		/* green     	*/
			$color_fifth 		= "#BD362F";		/* dark red  	*/
			$color_mono 		= "000";		/* black 	 	*/



		/** 01. SALES CHART
		******************************************* **/
		if (jQuery("#flot-sales").length > 0) {

			var d = [[119646300, 0], [11965, 0], [119663600, 0], [119672200, 77], [119680900, 3636], [119689500, 3575], [119698000, 2736], [119706800, 1086], [119715400, 676], [119724100, 1205], [119732700, 906], [119741000, 710], [119750000, 639], [119758600, 540], [119767300, 435], [119775900, 301], [119784000, 575], [119793200, 481], [119801800, 591], [119810500, 608], [119819100, 459], [119827000, 234], [119836400, 1352], [119845000, 686], [119853700, 279], [119862300, 449], [11987, 468], [119879600, 392], [119888200, 282], [119896900, 208], [119905500, 229], [119914000, 177], [119922800, 374], [119931400, 436], [119940100, 404], [119948700, 253], [119957000, 218], [119966000, 476], [119974600, 462], [119983300, 500], [119991900, 700], [10000, 750], [19200, 600], [120017800, 500], [120026500, 900], [120035100, 930], [120043000, 1200], [120052400, 980], [120061000, 950], [120069700, 900], [120078300, ], [12008, 1050], [120095600, 1150], [120104200, 1100], [120112900, 1200], [120121500, 1300], [120130000, 1700], [120138800, 1450], [120147400, 1500], [120156100, 546], [120164700, 614], [120173000, 954], [120182000, 1700], [120190600, 1800], [120199300, 1900], [120207900, ], [120216000, 2100], [120225200, 2200], [120233800, 2300], [120242500, 2400], [120251100, 2550], [120259000, 2600], [120268400, 2500], [120277000, 2700], [120285700, 2750], [120294300, 2800], [12030, 3245], [120311600, 3345], [120320200, ], [120328900, 3200], [120337500, 3300], [120346000, 3400], [120354800, 3600], [120363400, 3700], [120372100, 3800], [120380700, ], [120389000, 4500]];
		
			for (var i = 0; i < d.length; ++i) {
				d[i][0] += 60 * 60 * ;
			}
		
			function weekendAreas(axes) {
				var markings = [];
				var d = new Date(axes.xaxis.min);
				// go to the first Saturday
				d.setUTCDate(d.getUTCDate() - ((d.getUTCDay() + 1) % 7))
				d.setUTCSeconds(0);
				d.setUTCMinutes(0);
				d.setUTCHours(0);
				var i = d.getTime();
				do {
					// when we don't set yaxis, the rectangle automatically
					// extends to infinity upwards and downwards
					markings.push({
						xaxis : {
							from : i,
							to : i + 2 * 24 * 60 * 60 * 
						}
					});
					i += 7 * 24 * 60 * 60 * ;
				} while (i < axes.xaxis.max);
		
				return markings;
			}
		
			var options = {

				xaxis : {
					mode : "time",
					tickLength : 5
				},

				series : {
					lines : {
						show : true,
						lineWidth : 1,
						fill : true,
						fillColor : {
							colors : [{
								opacity : 0.1
							}, {
								opacity : 0.15
							}]
						}
					},
                   //points: { show: true },
					shadowSize : 0
				},

				selection : {
					mode : "x"
				},

				grid : {
					hoverable : true,
					clickable : true,
					tickColor : $color_border_color,
					borderWidth : 0,
					borderColor : $color_border_color,
				},

				tooltip : true,

				tooltipOpts : {
					content : "Your sales for <b>%x</b> was <span>$%y</span>",
					dateFormat : "%y-%0m-%0d",
					defaultTheme : false
				},

				colors : [$color_second],
		
			};
		
			var plot = jQuery.plot(jQuery("#flot-sales"), [d], options);
		}

		/** 02. SIN CHART
		******************************************* **/
		if (jQuery("#flot-sin").length > 0) {
			var sin = [], cos = [];
			for (var i = 0; i < 16; i += 0.5) {
				sin.push([i, Math.sin(i)]);
				cos.push([i, Math.cos(i)]);
			}
	
			var plot = jQuery.plot(jQuery("#flot-sin"), [{
				data : sin,
				label : "sin(x)"
			}, {
				data : cos,
				label : "cos(x)"
			}], {
				series : {
					lines : {
						show : true
					},
					points : {
						show : true
					}
				},
				grid : {
					hoverable : true,
					clickable : true,
					tickColor : $color_border_color,
					borderWidth : 0,
					borderColor : $color_border_color,
				},
				tooltip : true,
				tooltipOpts : {
					//content : "Value <b>$x</b> Value <span>$y</span>",
					defaultTheme : false
				},
				colors : [$color_second, $color_fourth],
				yaxis : {
					min : -1.1,
					max : 1.1
				},
				xaxis : {
					min : 0,
					max : 15
				}
			});
	
			jQuery("#flot-sin").bind("plotclick", function(event, pos, item) {
				if (item) {
					jQuery("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
					plot.highlight(item.series, item.datapoint);
				}
			});
		}
		
		/** 03. BAR CHART
		******************************************* **/
		if (jQuery("#flot-bar").length > 0) {

			var data1 = [];
			for (var i = 0; i <= 12; i += 1)
				data1.push([i, parseInt(Math.random() * 30)]);
	
			var data2 = [];
			for (var i = 0; i <= 12; i += 1)
				data2.push([i, parseInt(Math.random() * 30)]);
	
			var data3 = [];
			for (var i = 0; i <= 12; i += 1)
				data3.push([i, parseInt(Math.random() * 30)]);
	
			var ds = new Array();
	
			ds.push({
				data : data1,
				bars : {
					show : true,
					barWidth : 0.2,
					order : 1,
				}
			});
			ds.push({
				data : data2,
				bars : {
					show : true,
					barWidth : 0.2,
					order : 2
				}
			});
			ds.push({
				data : data3,
				bars : {
					show : true,
					barWidth : 0.2,
					order : 3
				}
			});
	
			//Display graph
			jQuery.plot(jQuery("#flot-bar"), ds, {
				colors : [$color_second, $color_fourth, "#666", "#BBB"],
				grid : {
					show : true,
					hoverable : true,
					clickable : true,
					tickColor : $color_border_color,
					borderWidth : 0,
					borderColor : $color_border_color,
				},
				legend : true,
				tooltip : true,
				tooltipOpts : {
					content : "<b>%x</b> = <span>%y</span>",
					defaultTheme : false
				}
	
			});
	
		}

		/** 04. BAR CHART HORIZONTAL
		******************************************* **/
		if (jQuery("#flot-bar-horizontal").length > 0) {
			//Display horizontal graph
			var d1_h = [];
			for (var i = 0; i <= 3; i += 1)
				d1_h.push([parseInt(Math.random() * 30), i]);
	
			var d2_h = [];
			for (var i = 0; i <= 3; i += 1)
				d2_h.push([parseInt(Math.random() * 30), i]);
	
			var d3_h = [];
			for (var i = 0; i <= 3; i += 1)
				d3_h.push([parseInt(Math.random() * 30), i]);
	
			var ds_h = new Array();
			ds_h.push({
				data : d1_h,
				bars : {
					horizontal : true,
					show : true,
					barWidth : 0.2,
					order : 1,
				}
			});
			ds_h.push({
				data : d2_h,
				bars : {
					horizontal : true,
					show : true,
					barWidth : 0.2,
					order : 2
				}
			});
			ds_h.push({
				data : d3_h,
				bars : {
					horizontal : true,
					show : true,
					barWidth : 0.2,
					order : 3
				}
			});
	
			// display graph
			jQuery.plot(jQuery("#flot-bar-horizontal"), ds_h, {
				colors : [$color_second, $color_fourth, "#666", "#BBB"],
				grid : {
					show : true,
					hoverable : true,
					clickable : true,
					tickColor : $color_border_color,
					borderWidth : 0,
					borderColor : $color_border_color,
				},
				legend : true,
				tooltip : true,
				tooltipOpts : {
					content : "<b>%x</b> = <span>%y</span>",
					defaultTheme : false
				}
			});
	
		} 

		/** 05. PIE CHART
		******************************************* **/
		if (jQuery("#flot-pie").length > 0) {

				var data_pie = [];
				var series = Math.floor(Math.random() * 10) + 1;
				for (var i = 0; i < series; i++) {
					data_pie[i] = {
						label : "Series" + (i + 1),
						data : Math.floor(Math.random() * 100) + 1
					}
				}
	
				jQuery.plot(jQuery("#flot-pie"), data_pie, {
					series : {
						pie : {
							show : true,
							innerRadius : 0.5,
							radius : 1,
							label : {
								show : false,
								radius : 2 / 3,
								formatter : function(label, series) {
									return '<div style="font-size:11px;text-align:center;padding:4px;color:white;">' + label + '<br/>' + Math.round(series.percent) + '%</div>';
								},
								threshold : 0.1
							}
						}
					},
					legend : {
						show : true,
						noColumns : 1, // number of colums in legend table
						labelFormatter : null, // fn: string -> string
						labelBoxBorderColor : "", // border color for the little label boxes
						container : null, // container (as jQuery object) to put legend in, null means default on top of graph
						position : "ne", // position of default legend container within plot
						margin : [5, 10], // distance from grid edge to default legend container within plot
						backgroundColor : "#efefef", // null means auto-detect
						backgroundOpacity : 1 // set to 0 to avoid background
					},
					grid : {
						hoverable : true,
						clickable : true
					},
				});
	
		}

		/** 06. STATS CHART
		******************************************* **/
		if (jQuery("#flot-stats").length) {
	
			var pageviews = [[1, 75], [3, 87], [4, 93], [5, 127], [6, 116], [7, 137], [8, 135], [9, 130], [10, 167], [11, 169], [12, 179], [13, 185], [14, 176], [15, 180], [16, 174], [17, 193], [18, 186], [19, 177], [20, 153], [21, 149], [22, 130], [23, 100], [24, 50]];
			var visitors = [[1, 65], [3, 50], [4, 73], [5, 100], [6, 95], [7, 103], [8, 111], [9, 97], [10, 125], [11, 100], [12, 95], [13, 141], [14, 126], [15, 131], [16, 146], [17, 158], [18, 160], [19, 151], [20, 125], [21, 110], [22, 100], [23, 85], [24, 37]];

			var plot = jQuery.plot(jQuery("#flot-stats"), [{
				data : pageviews,
				label : "Your pageviews"
			}, {
				data : visitors,
				label : "Site visitors"
			}], {
				series : {
					lines : {
						show : true,
						lineWidth : 1,
						fill : true,
						fillColor : {
							colors : [{
								opacity : 0.1
							}, {
								opacity : 0.15
							}]
						}
					},
					points : {
						show : true
					},
					shadowSize : 0
				},
				xaxis : {
					mode : "time",
					tickLength : 10
				},
	
				yaxes : [{
					min : 20,
					tickLength : 5
				}],
				grid : {
					hoverable : true,
					clickable : true,
					tickColor : $color_border_color,
					borderWidth : 0,
					borderColor : $color_border_color,
				},
				tooltip : true,
				tooltipOpts : {
					content : "%s for <b>%x:00 hrs</b> was %y",
					dateFormat : "%y-%0m-%0d",
					defaultTheme : false
				},
				colors : [$color_main, $color_second],
				xaxis : {
					ticks : 15,
					tickDecimals : 2
				},
				yaxis : {
					ticks : 15,
					tickDecimals : 0
				},
			});
	
		}

		/** 07. REALTIME CHART
		******************************************* **/
		if (jQuery("#flot-realtime").length) {
	
			// For the demo we use generated data, but normally it would be coming from the server
			var data = [], totalPoints = 200;
			function getRandomData() {
				if (data.length > 0)
					data = data.slice(1);
	
				// do a random walk
				while (data.length < totalPoints) {
					var prev = data.length > 0 ? data[data.length - 1] : 50;
					var y = prev + Math.random() * 10 - 5;
					if (y < 0)
						y = 0;
					if (y > 100)
						y = 100;
					data.push(y);
				}
	
				// zip the generated y values with the x values
				var res = [];
				for (var i = 0; i < data.length; ++i)
					res.push([i, data[i]])
				return res;
			}
	
			// setup control widget
			var updateInterval = ;
			jQuery("#flot-realtime").val(updateInterval).change(function() {
				var v = jQuery(this).val();
				if (v && !isNaN(+v)) {
					updateInterval = +v;
					if (updateInterval < 1)
						updateInterval = 1;
					if (updateInterval > )
						updateInterval = ;
					jQuery(this).val("" + updateInterval);
				}
			});
	
			// setup plot
			var options = {
				yaxis : {
					min : 0,
					max : 100
				},
				xaxis : {
					min : 0,
					max : 100
				},
				colors : [$color_fourth],
				series : {
					lines : {
						lineWidth : 1,
						fill : true,
						fillColor : {
							colors : [{
								opacity : 0.4
							}, {
								opacity : 0
							}]
						},
						steps : false
	
					}
				}
			};
			var plot = jQuery.plot(jQuery("#flot-realtime"), [getRandomData()], options);
	
			function update() {
				plot.setData([getRandomData()]);
				// since the axes don't change, we don't need to call plot.setupGrid()
				plot.draw();
	
				setTimeout(update, updateInterval);
			}
	
			update();
	
		}

	}
