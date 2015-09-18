<?php 


class Init   { 
	
	public function __construct (Entity $e) { 
		$this->init($e); 
		
	}
	
	
	
	public function init ($e) {
		switch ($e->name)  { 
			
			case  'Scoli': { 
				$e->name='Scoli';$e->next='Clase'; 
				$e->idtf[]='ids'; $e->idtf[]='nume';$e->idtf[]=null; 
				$e->idtfn[]='idc'; $e->idtfn[]='nume';
				$e->message='Lista scolilor'; 
				
				break; 
			            
						}
			case  'Clase': { 
				
				$e->name='Clase';$e->next='Elevi'; $e->prev='Scoli'; 
				$e->idtf[]='idc'; $e->idtf[]='nume'; $e->idtf[]='idcs'; 
				$e->idtfp[]='ids'; $e->idtfp[]='nume';
				$e->idtfn[]='ide'; $e->idtfn[]='nume';
				$e->fki='idcs'; 
				$e->message='Lista claselor din scoala :'; 
				$e->message1='Inapoi la '; 
				
				break ;
			}
			case  'Elevi': { 
				$e->name='Elevi';$e->next='Materii'; $e->prev='Clase';
				$e->idtf[]='ide'; $e->idtf[]='nume'; $e->idtf[]='idec';
				$e->idtfp[]='idc'; $e->idtfp[]='nume';
				$e->idtfn[]='idm'; $e->idtfn[]='nume';
				$e->fki='idec'; 
				$e->message='Lista elevilor din clasa :'; 
				$e->message1='Inapoi la clasele scolii: '; 
				break ;
			}
			case  'Materii': { 
				$e->name='Materii';$e->next='Note'; $e->prev='Elevi';
				$e->idtf[]='idm'; $e->idtf[]='nume'; $e->idtf[]='idme'; 
				$e->idtfp[]='ide'; $e->idtfp[]='nume';
				$e->idtfn[]='idn'; $e->idtfn[]='nume';
				$e->fki='idme'; 
				$e->message='Lista materiilor studiate de elevul: ' ; 
				$e->message1='Inapoi la elevii clasei: '; 
				
				break ;
			}
			
			case  'Note': { 
				'Lista notelor la materia ' ; 
				$e->name='Note'; $e->prev='Materii';
				$e->idtf[]='idn'; $e->idtf[]='nota';$e->idtf[]='data';$e->idtf[]='idnm'; 
				$e->idtfp[]='idm'; $e->idtfp[]='nume';			
				$e->fki='idnm'; 
				$e->message='Lista notelor 	la materia: ';  
				$e->message1='Inapoi la materiile studiate de elevul: '; 
				break ;
			}
			
		}
		
	}
	
	
	

}