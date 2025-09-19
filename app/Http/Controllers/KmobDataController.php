<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Input, Redirect ; 

class KmobDataController extends Controller
{
   public function index(  ) {

   	return response()->json(['status'=>'success' , 'data' => []]);
   } 

   function show(Request $request, $id = null)
   {

      switch($id) {
         default :
            return response()->json(['status'=>'success' , 'page' => $id , 'data' => []]);
            break ;

         case 'k-tim' :
            $tim_id     = $request->get('tim_id');
            $unit       = $request->get('unit');
            $es       = $request->get('es');
            $opd       = $request->get('o');
            $un         = str_replace("_"," ",$request->get('un'));
            $data_ktim        = [];
            $data_struktural  = [];

          //  $unit = 874;
            if( $tim_id != '' && $unit =='') {
               $data_ktim = $this->getItemKtim( $tim_id );
            }

            if( $unit != '') {
               $data_struktural = $this->getItemStuktural( $unit , $es , $opd );
            }

            return response()->json(['status'=>'success' , 'data_ktim' => $data_ktim , 'data_struktural' => $data_struktural ]); 
            break;   
      }
      

   }

   public function getItemKtim( $tim_id ) {
      $rows = \DB::table('kinerja_sub_kegiatan')->whereIn('tim_kerja_id', explode(",",$tim_id))->get();
      foreach($rows as $row) {
         $row->target_bulanan = json_decode( $row->target_bulanan);
         $row->anggaran_bulanan = json_decode( $row->anggaran_bulanan); 
          $row->parent_id_sakip = $row->kinerja_kegiatan_id ;
         $row->tipe = 'Sub Kegiatan';
         $data[] = $row;
      }
      return $rows ;
   } 

   public function getItemStuktural( $unit , $es , $opd  ) {
      $data = [];
      $check = \DB::table('v_struktur_organisasi')->where(['lv1_unit_kerja_id' => $unit ,  'lv2_unit_kerja_id' => null ] )->get();
      if( in_array($es,[41,42,40]) ) {
         $check = \DB::table('v_struktur_organisasi')->where(['lv2_unit_kerja_id' => $unit  ] )->get();
      }
      $id = 0 ;
      if(count($check) > 0 ) {
         $id = $check[0]->id; 
        
      } 
      if( in_array($es,[41,42,40]) ) {
         // Hanya Eselon 4 Saja 

         $rows = \DB::table('kinerja_sub_kegiatan')->where('v_struktur_organisasi_id',$id)->get();
         foreach($rows as $row) {
            $row->target_bulanan = json_decode( $row->target_bulanan);
            $row->anggaran_bulanan = json_decode( $row->anggaran_bulanan); 
            $row->parent_id_sakip = $row->kinerja_kegiatan_id ;
            $row->tipe = 'kegiatan';
            $data[] = $row;
         }
      } else if( in_array($es,[21,22]) ) {
         $opd = self::opd_id( $opd );  
         $rows = \DB::table('sasaran_strategis_pd')->where('satuan_kerja_id',$opd)->get();
         foreach($rows as $row) {
            $row->sasaran = $row->sasaran_strategis_satker;
            $row->indikator = $row->iku;
            $row->target = $row->target_1;
            $row->tahun_kinerja = date("Y");
            $row->parent_id_sakip = $row->sasaran_strategis_id ;
            $row->target_bulanan = ['jan'=>0, 'feb'=>0, 'mar'=>0, 'apr'=>0, 'mei'=>0, 'jun'=>0, 'jul'=>0, 'aug'=>0, 'sep'=>0, 'okt'=>0, 'nov'=>0, 'dec'=> $row->target_1 ];
            $row->anggaran_bulanan = ['jan'=>0, 'feb'=>0, 'mar'=>0, 'apr'=>0, 'mei'=>0, 'jun'=>0, 'jul'=>0, 'aug'=>0, 'sep'=>0, 'okt'=>0, 'nov'=>0, 'dec'=> $row->target_1];
            $row->tipe = 'iku';
            $row->anggaran = 0;
            $data[] = $row;
         }

      } else {
         $rows = \DB::table('kinerja_kegiatan')->where('v_struktur_organisasi_id',$id)->get();
         foreach($rows as $row) {
            $row->target_bulanan = json_decode( $row->target_bulanan);
            $row->anggaran_bulanan = json_decode( $row->anggaran_bulanan); 
            $row->parent_id_sakip = $row->kinerja_program_id ;
            $row->tipe = 'kegiatan';
            $data[] = $row;
         }
         $rows2 = \DB::table('kinerja_program')->where('v_struktur_organisasi_id',$id)->get();
         foreach($rows2 as $row) {
            $row->target_bulanan = json_decode( $row->target_bulanan);
            $row->anggaran_bulanan = json_decode( $row->anggaran_bulanan); 
             $row->parent_id_sakip = $row->sasaran_strategis_pd_id ;
            $row->tipe = 'program';
            $data[] = $row;
         }        

      }
      return $data ;
   } 

   public static function opd_id($value='')
   {
      $id = 0;
      switch($value) {
         default:

            break;
         case '1036' : $id = 1 ; break ;   
      }
      return $id ;
   }

}