<h4 class="font-w400">SilikaPR</h4>
					<p>
						<form action="?silikapr-add" class="seri silikapr" ajax=".SilicaPR-ajax" method="post">
						{{csrf_field()}}
							<select name="" id="" onchange="location.href='?id2='+$(this).val()+'&active=1'" class="form-control">
								<option value="">{{e2("Select History")}}</option>
							<?php $sorgu = db("silikapr-mo")->take(5)->orderBy("id","DESC")->get(); foreach($sorgu AS $s) { 
								$j = j($s->json,false);
							?>
								<option value="{{$s->id}}" <?php if(getesit("id2",$s->id)) echo "selected"; ?>>{{$s->created_at}}</option>
							<?php } ?>
							</select>
							<?php if(getisset("id2") && !getesit("id","")) {
								$sorgu =  db("silikapr-mo")->where("id2",get("id"))->orderBy("id","DESC")->get();
							} ?>
							<?php $j = j($sorgu[0]->json); unset($j['_token']); //print_r($j);  ?>
							<script type="text/javascript">
							$(function(){
								<?php foreach($j AS $a => $d) { $a = str_replace("_"," ",$a); ?>
								$(".silikapr [name='{{$a}}']").val("{{$d}}");
								<?php } ?>
							});
							</script>
							{{e2("Lieferdatum")}}:
							<input type="date" name="Lieferdatum" id="" class="form-control" />
							{{e2("Schicht")}}:
							<select name="Schicht" id="" class="form-control">
								<option value="{{e2("Früh")}}">{{e2("Früh")}}</option>
								<option value="{{e2("Spät")}}">{{e2("Spät")}}</option>
								<option value="{{e2("Nacht")}}">{{e2("Nacht")}}</option>
							</select>
							{{e2("Mass Stock in to")}}:
							<input type="number" min="0" step="any" name="Mass Stock in to" id="" class="form-control" />
							{{e2("Quality")}}:
							<input type="text" name="Quality" id="" class="form-control" />
							{{e2("Versatz")}}:
							<input type="text" name="Versatz" id="" class="form-control" />
							{{e2("Workstation")}}:
							<select name="Workstation" id="" class="form-control select2">
								<option value="">{{e2("Please Select")}}</option>
							<?php $ws = contents("silikapr-workstations"); foreach($ws AS $w) { ?>
								<option value="{{$w->title}}">{{e2($w->title)}}</option>
							<?php } ?>
							</select>
							{{e2("Bedarf in to")}}:
							<input type="number" name="Bedarf in to" id="" class="form-control" min="0" step="any" />
							{{e2("Remark")}}:
							<textarea name="Remark" id="" cols="30" rows="10" class="form-control"></textarea>
							
							
							<button type="submit" class="btn btn-primary min-width-125 mt-20">Save</button>
						
						</form>
						<div class="SilicaPR-ajax" ajax2="{{$path}}.list.silikapr"></div>
					</p>