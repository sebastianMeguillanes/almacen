

  <?php
  include_once("header.php");
  ?>
  <!-- content -->
<div id="content" class="app-content box-shadow-z0" role="main">
    <div class="app-header white box-shadow">
        <div class="navbar navbar-toggleable-sm flex-row align-items-center">
            <!-- Open side - Naviation on mobile -->
            <a data-toggle="modal" data-target="#aside" class="hidden-lg-up mr-3">
              <i class="material-icons">&#xe5d2;</i>
            </a>
        	<div class="mb-0 h5 no-wrap" ng-bind="$state.current.data.title" id="pageTitle"></div>
            <div class="collapse navbar-collapse" id="collapse">
              <!-- link and dropdown -->
              <ul class="nav navbar-nav mr-auto">
                <li class="nav-item dropdown">
                  <a class="nav-link" href data-toggle="dropdown">
                    <i class="fa fa-fw fa-plus text-muted"></i>
                    <span>Nuevo</span>
                  </a>
                  <div ui-include="'../views/blocks/dropdown.new.html'"></div>
                </li>
              </ul>
              <div ui-include="'../views/blocks/navbar.form.html'"></div>
            </div>
        </div>
    </div>

	<div ui-view="" class="app-body" id="view">
		<div class="padding">
			<div class="row">



				<div class="col-sm-6 col-md-4">
					<div class="box">
					<div class="box-header">
						<h3>Line</h3>
						<small class="block text-muted">Subtitle here</small>
					</div>
					<div style="margin: 0 -2px">
						<div ui-jp="plot" ui-refresh="app.setting.color" ui-options="
						[
							{ 
							data: [[1, 6.1], [2, 6.3], [3, 6.4], [4, 6.6], [5, 7.0], [6, 7.7], [7, 8.3]], 
							points: { show: true, radius: 0}, 
							splines: { show: true, tension: 0.45, lineWidth: 2, fill: 0.1 } 
							}
						],
						{
							colors: ['#0cc2aa'],
							series: { shadowSize: 3 },
							xaxis: { show: false, font: { color: '#ccc' }, position: 'bottom' },
							yaxis:{ show: false, font: { color: '#ccc' }, max:10, min: 2},
							grid: { hoverable: true, clickable: true, borderWidth: 0, color: '#ccc' },
							tooltip: true,
							tooltipOpts: { content: '%x.0 is %y.4',  defaultTheme: false, shifts: { x: 0, y: -40 } }
						}
						" style="height:232px" >
						</div>
					</div>
					</div>
				</div>




				<div class="col-sm-6 col-md-4">
					<div class="box">
					<div class="box-header">
						<h3>Line with points</h3>
						<small>Plenty of options to control</small>
					</div>
					<div class="box-body">
						<div ui-jp="plot" ui-refresh="app.setting.color" ui-options="
						[
							{ 
							data: [[1, 5.5], [2, 5.7], [3, 6.4], [4, 7.0], [5, 7.2], [6, 7.3], [7, 7.5]], 
							points: { show: true, radius: 5}, 
							splines: { show: true, tension: 0.45, lineWidth: 5} 
							}
						], 
						{
							colors: ['#fcc100'],
							series: { shadowSize: 3 },
							xaxis: { show: true, font: { color: '#ccc' }, position: 'bottom' },
							yaxis:{ show: true, font: { color: '#ccc' }, min:3},
							grid: { hoverable: true, clickable: true, borderWidth: 0, color: 'rgba(120,120,120,0.5)' },
							tooltip: true,
							tooltipOpts: { content: '%x.0 is %y.4',  defaultTheme: false, shifts: { x: 0, y: -40 } }
						}
						" style="height:200px" >
						</div>
					</div>
					</div>
				</div>




				<div class="col-sm-6 col-md-4">
					<div class="box">
					<div class="box-header">
						<h3>Line with fill</h3>
						<small>Simple usage</small>
					</div>
					<div class="box-body">
						<div ui-jp="plot" ui-refresh="app.setting.color" ui-options="
						[
							{ 
							data: [[1, 2], [2, 1.6], [3, 2.4], [4, 2.1], [5, 1.7], [6, 1.5], [7, 1.7]], 
							points: { show: true, radius: 3}, 
							splines: { show: true, tension: 0.45, lineWidth: 0, fill: 0.4} 
							}
						], 
						{
							colors: ['#0cc2aa'],
							series: { shadowSize: 3 },
							xaxis: { show: true, font: { color: '#ccc' }, position: 'bottom' },
							yaxis:{ show: true, font: { color: '#ccc' }, min:1},
							grid: { hoverable: true, clickable: true, borderWidth: 0, color: 'rgba(120,120,120,0.5)' },
							tooltip: true,
							tooltipOpts: { content: '%x.0 is %y.4',  defaultTheme: false, shifts: { x: 0, y: -40 } }
						}
						" style="height:200px" >
						</div>
					</div>
					</div>
				</div>





				<div class="col-sm-6 col-md-4">
					<div class="box">
					<div class="box-header">
						<h3>Pie</h3>
						<small>Interactive features</small>
					</div>
					<div class="box-body">
						<div ui-jp="plot" ui-refresh="app.setting.color" ui-options="
						[{data: 70, label:&#x27;Server&#x27;}, {data: 30, label: &#x27;Client&#x27;}],
						{
							series: { pie: { show: true, innerRadius: 0.6, stroke: { width: 0 }, label: { show: true, threshold: 0.05 } } },
							legend: {backgroundColor: 'transparent'},
							colors: ['#0cc2aa','#fcc100'],
							grid: { hoverable: true, clickable: true, borderWidth: 0, color: 'rgba(120,120,120,0.5)' },   
							tooltip: true,
							tooltipOpts: { content: '%s: %p.0%' }
						}
						" style="height:200px"></div>
					</div>
					</div>
				</div>






				<div class="col-sm-6 col-md-4">
					<div class="box">
					<div class="box-header">
						<h3>Pie</h3>
						<small>Full fill</small>
					</div>
					<div class="box-body">
						<div ui-jp="plot" ui-refresh="app.setting.color" ui-options="
						[{data: 75, label: &#x27;iPhone&#x27;}, {data: 20, label: &#x27;iPad&#x27;}],
						{
							series: { pie: { show: true, innerRadius: 0, stroke: { width: 0 }, label: { show: true, threshold: 0.05 } } },
							legend: {backgroundColor: 'transparent'},
							colors: ['#0cc2aa','#fcc100'],
							grid: { hoverable: true, clickable: true, borderWidth: 0, color: 'rgba(120,120,120,0.5)' },   
							tooltip: true,
							tooltipOpts: { content: '%s: %p.0%' }
						}
						" style="height:200px"></div>
					</div>
					</div>
				</div>




				<div class="col-sm-6 col-md-4">
					<div class="box">
					<div class="box-header">
						<h3>Order Bars</h3>
						<small>With orders</small>
					</div>
						<div class="box-body">
							<div ui-jp="plot" ui-refresh="app.setting.color" ui-options="
							[
								{ data: [[1, 2], [2, 4], [3, 5], [4, 7], [5, 6], [6, 4], [7, 5], [8, 4]] },
								{ data: [[1, 3], [2, 4], [3, 3], [4, 6], [5, 5], [6, 4], [7, 5], [8, 3]] }
							], 
							{
								bars: { show: true, fill: true,  barWidth: 0.3, lineWidth: 1, order: 1, fillColor: { colors: [{ opacity: 0.5 }, { opacity: 0.9}] }, align: 'center'},
								colors: ['#0cc2aa','#fcc100'],
								series: { shadowSize: 3 },
								xaxis: { show: true, font: { color: '#ccc' }, position: 'bottom' },
								yaxis:{ show: true, font: { color: '#ccc' }},
								grid: { hoverable: true, clickable: true, borderWidth: 0, color: 'rgba(120,120,120,0.5)' },
								tooltip: true,
								tooltipOpts: { content: '%x.0 is %y.4',  defaultTheme: false, shifts: { x: 0, y: -40 } }
							}
							" style="height:200px" >
							</div>
						</div>
					</div>
				</div>




				
			</div>
		</div>
	</div>


</div>
    
<?php
include_once("footer.php");
?>