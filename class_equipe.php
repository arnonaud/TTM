<?php
class Equipe {

  private $_nom;
  private $_points;
  private $_joue;
  private $_victoire;
  private $_nul;
  private $_defaite;
  private $_pg;
  private $_pp;


  public function equipe(){
  	$this->_victoire = 0;
  	$this->_defaite = 0;
  	$this->_nul = 0;
  	$this->_pg = 0;
  	$this->_pp = 0;
  }

  public function getNom() {
  	return $this->_nom;
  }
  public function setNom($nom) {
  	$this->_nom = $nom;
  }
  public function getPoint() {
  	return $this->_points;
  }
  public function setPoint($points) {
  	$this->_points = $points;
  }
  public function getJoue() {
  	return $this->_joue;
  }
  public function setJoue($joue) {
  	$this->_joue = $joue;
  }
  public function getVictoire() {
  	return $this->_victoire;
  }
  public function setVictoire($victoire) {
  	$this->_victoire = $victoire;
  }
  public function getNul() {
  	return $this->_nul;
  }
  public function setNul($nul) {
  	$this->_nul = $nul;
  }
  public function getDefaite() {
  	return $this->_defaite;
  }
  public function setDefaite($defaite) {
  	$this->_defaite = $defaite;
  }
  public function getPG() {
  	return $this->_pg;
  }
  public function setPG($pg) {
  	$this->_pg = $pg;
  }
  public function getPP() {
  	return $this->_pp;
  }
  public function setPP($pp) {
  	$this->_pp = $pp;
  }
  public function addVictoire(){
  	$this->_victoire++;
  }
  public function addNul(){
  	$this->_nul++;
  }
  public function addDefaite(){
  	$this->_defaite++;
  }
  public function addPG($pg){
  	$this->_pg += $pg;
  }
  public function addPP($pp){
  	$this->_pp += $pp;
  }
}
