<?php 
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

function hugo_link_shortcode() {?>
<div class="hugo-wrapper">
	<div id="hg-button" class="hg-closed"></div>
	<div class="hg-form-wrapper">
		<div class="hg-title">Verwijs naar Hugo</div>
		<form id="hg-form">
			<div class="panel-group" id="hg-accordion" role="tablist" aria-multiselectable="true">
			    <div class="panel panel-default">
			        <div class="panel-heading" role="tab" id="hg-header-dierenarts">
			            <h4 class="panel-title">
				        	<a role="button" data-toggle="collapse" data-parent="#hg-accordion" href="#hg-dierenarts" aria-expanded="true" aria-controls="hg-dierenarts">
			    	    		Dierenarts: <span class="panel-title-placeholder"></span>
			    	    		<span class="glyphicon glyphicon-minus-sign"></span>
			        		</a>
			      		</h4>
			        </div>
			        <div id="hg-dierenarts" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="hg-header-dierenarts">
			            <div class="panel-body">
							<div class="form-group">
								<label for="da-praktijk" class="control-label">Praktijknaam</label>
								<input type="text" class="form-control" id="da-praktijk" placeholder="Vul de naam van de praktijk in" required>
							</div>
							<div class="form-group">
								<label for="da-plaats" class="control-label">Plaats</label>
								<input type="text" class="form-control" id="da-plaats" placeholder="Vul de plaats van de praktijk in">
							</div>
							<div class="form-group">
								<label for="da-naam" class="control-label">Naam</label>
								<input type="text" class="form-control" id="da-naam" placeholder="Vul je naam in">
							</div>
							<div class="form-group">
								<label for="da-email" class="control-label">E-mail</label>
								<input type="email" class="form-control" id="da-email" placeholder="Vul je email adres in" required>
							</div>
			            </div>
			        </div>
			    </div>
			    <div class="hg-reden-wrapper">
			    	<div class="form-group">
				    	<label for="hg-verwijzing" class="col-sm-12 control-label">Reden verwijzing</label>
				    	<textarea id="hg-verwijzing" class="form-control" rows="3" placeholder="Vul de reden voor de verwijzing in" required></textarea>
				    </div>
			    </div>
			    <div class="panel panel-default">
			        <div class="panel-heading" role="tab" id="hg-header-patient">
			            <h4 class="panel-title">
					        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#hg-accordion" href="#hg-patient" aria-expanded="false" aria-controls="hg-patient">
			        			Patient: <span class="panel-title-placeholder"></span>
								<span class="glyphicon glyphicon-plus-sign"></span>
			        		</a>
			      		</h4>
			        </div>
			        <div id="hg-patient" class="panel-collapse collapse" role="tabpanel" aria-labelledby="hg-header-patient">
			            <div class="panel-body">
							<div class="form-group">
								<label for="p-naam" class="control-label">Naam</label>
								<input type="text" class="form-control" id="p-naam" placeholder="Vul de naam van de patient in">
							</div>
							<div class="form-group">
								<label for="p-soort" class="control-label">Soort</label>
								<input type="text" class="form-control" id="p-soort" placeholder="Is het een hond, kat, ...?" required>
							</div>
							<div class="form-group">
								<label for="p-ras" class="control-label">Ras</label>
								<input type="text" class="form-control" id="p-ras" placeholder="Vul het ras in">
							</div>
							<div class="form-group">
								<label for="p-gebdatum" class="control-label">Geb Datum</label>
								<input type="text" class="form-control" id="p-gebdatum" placeholder="Vul de geboortedatum in">
							</div>
							<div class="form-group">
								<label class="control-label">Geslacht</label>
								<label class="radio-inline">
									<input type="radio" name="p-geslacht" id="p-geslacht-m" value="m" required> M
								</label>
								<label class="radio-inline">
									<input type="radio" name="p-geslacht" id="p-geslacht-mg" value="mg" required> MG
								</label>
								<label class="radio-inline">
									<input type="radio" name="p-geslacht" id="p-geslacht-v" value="v" required> V
								</label>
								<label class="radio-inline">
									<input type="radio" name="p-geslacht" id="p-geslacht-vg" value="vg" required> VG
								</label>
								<label class="radio-inline">
									<input type="radio" name="p-geslacht" id="p-geslacht-o" value="o" required> O
								</label>
							</div>
			            </div>
			        </div>
			    </div>
			    <div class="panel panel-default">
			        <div class="panel-heading" role="tab" id="hg-header-eigenaar">
			            <h4 class="panel-title">
			        		<a class="collapsed" role="button" data-toggle="collapse" data-parent="#hg-accordion" href="#hg-eigenaar" aria-expanded="false" aria-controls="hg-eigenaar">
			          			Eigenaar: <span class="panel-title-placeholder"></span>
			        			<span class="glyphicon glyphicon-plus-sign"></span>
			        		</a>
			      		</h4>
			        </div>
			        <div id="hg-eigenaar" class="panel-collapse collapse" role="tabpanel" aria-labelledby="hg-header-eigenaar">
			            <div class="panel-body">
							<div class="form-group">
								<label for="e-naam" class="control-label">Naam</label>
								<input type="text" class="form-control" id="e-naam" placeholder="Vul de naam van de eigenaar in" required>
							</div>
							<div class="form-group">
								<label for="e-email" class="control-label">E-mail</label>
								<input type="email" class="form-control" id="e-email" placeholder="E-mail" required>
							</div>
							<div class="form-group">
								<label for="e-tel" class="control-label">Tel</label>
								<input type="tel" class="form-control" id="e-tel" placeholder="Tel" required>
							</div>
			            </div>
			        </div>
			    </div>
			</div>
			<div class="form-group">
				<label for="contact-via" class="col-sm-6 control-label">Contact met eigenaar via</label>
				<div class="col-sm-6">
					<label class="radio-inline">
						<input type="radio" name="contact-via" id="contact-via1" value="email" required> E-mail
					</label>
					<label class="radio-inline">
						<input type="radio" name="contact-via" id="contact-via2" value="tel" required> Telefonisch
					</label>
				</div>
			</div>
			<div class="row" style="clear:both">
				<div class="col-sm-6 text-left">
					<button type="button" id="hg-clear" class="btn btn-default">WIS</button>
				</div>
				<div class="col-sm-6 text-right">
					<button type="submit" class="btn btn-success">VERSTUUR</button>
				</div>
			</div>
		</form>
	</div>
</div>
<?php
}
?>