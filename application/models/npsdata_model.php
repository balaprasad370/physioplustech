<?php
class Npsdata_model extends CI_Model
{
		function saveNps_data($post_array)
		{
			if($post_array['nps_score']!=''&& $post_array['patient_id']!='' && $post_array['staff_id']!='')
			{
				$npsQuery = $this->db->select('*')->FROM("tbl_nps_score")->where(array('patient_id'=>$post_array['patient_id'],'staff_id'=>$post_array['staff_id']))->get();
				/* if($npsQuery->num_rows()>0)
				{
					$npsdata = $npsQuery->row_array();
					$npsUpdateArray = array(
										"nps_score"=>$post_array['nps_score'],
										"disappointed_experience"=>(isset($post_array['dp']) && $post_array['dp']!='') ? $post_array['dp'] : "",
										"passive_experience"=>(isset($post_array['pe']) && $post_array['pe']!='') ? $post_array['pe'] : "",
										);
					$this->db->update('tbl_nps_score',$npsUpdateArray,array('patient_id'=>$npsdata['patient_id'],'staff_id'=>$npsdata['staff_id']));	
					return $npsdata['score_id'];
				}else 
				{*/
						$npsArray = array("patient_id"=>$post_array['patient_id'],
										"staff_id"=>$post_array['staff_id'],
										"nps_score"=>$post_array['nps_score'],
										"disappointed_experience"=>(isset($post_array['dp']) && $post_array['dp']!='') ? $post_array['dp'] : "",
										"passive_experience"=>(isset($post_array['pe']) && $post_array['pe']!='') ? $post_array['pe'] : "",
										);
						$this->db->insert('tbl_nps_score',$npsArray);
						return $this->db->insert_id();
				/* }	 */
				
			}	
		}
}

?>