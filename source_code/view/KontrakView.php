<?php

interface KontrakView{
	public function tampil();
	public function delete($id);
	public function add($data);
	public function edit($id);
}

?>
