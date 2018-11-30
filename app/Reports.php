<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Facade;

class Reports extends Model
{

    protected $table="members";


    public  function getAllMemberBptCheif(){
        $sql="select r.region_name,d.district_name,(select count(mm.isLeader) from members mm where mm.isLeader=1) as lscount,(select count(mmm.sex_id) from members mmm where mmm.sex_id=1) as sxcount,
                                 (select count(mmal.specialist) from members mmal where mmal.specialist like \"%Олий%\") as spccountoliy,
                                 (select count(mmal.specialist) from members mmal where mmal.specialist like \"%Ўрта%\") as spccounturta,
                                 
                                 (SELECT count(YEAR(CURRENT_TIMESTAMP) - YEAR(mday.birthday) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(birthday, 5))) as age 
                                  FROM members mday 
	                              where YEAR(CURRENT_TIMESTAMP) - YEAR(mday.birthday) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(birthday, 5))<=30
	                              order by age desc)  as age30,
	                              (SELECT count(YEAR(CURRENT_TIMESTAMP) - YEAR(mday3040.birthday) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(mday3040.birthday, 5))) as age 
                                  FROM members mday3040 
	                              where (YEAR(CURRENT_TIMESTAMP) - YEAR(mday3040.birthday) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(mday3040.birthday, 5))>=30) and 
				                        (YEAR(CURRENT_TIMESTAMP) - YEAR(mday3040.birthday) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(mday3040.birthday, 5))<=45) 
	                                    order by age desc) as age3040,
                                  (SELECT count(YEAR(CURRENT_TIMESTAMP) - YEAR(mday4555.birthday) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(mday4555.birthday, 5))) as age 
                                  FROM members mday4555 
	                              where (YEAR(CURRENT_TIMESTAMP) - YEAR(mday4555.birthday) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(mday4555.birthday, 5))>=45) and 
				                        (YEAR(CURRENT_TIMESTAMP) - YEAR(mday4555.birthday) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(mday4555.birthday, 5))<=55) 
	                                    order by age desc) as age4555,
	                              (SELECT count(YEAR(CURRENT_TIMESTAMP) - YEAR(mday5560.birthday) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(mday5560.birthday, 5))) as age 
                                  FROM members mday5560 
	                              where (YEAR(CURRENT_TIMESTAMP) - YEAR(mday5560.birthday) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(mday5560.birthday, 5))>=55) and 
				                        (YEAR(CURRENT_TIMESTAMP) - YEAR(mday5560.birthday) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(mday5560.birthday, 5))<=60) 
	                                    order by age desc) as age5560,
	                              (SELECT count(YEAR(CURRENT_TIMESTAMP) - YEAR(mday60.birthday) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(mday60.birthday, 5))) as age 
                                  FROM members mday60 
	                              where (YEAR(CURRENT_TIMESTAMP) - YEAR(mday60.birthday) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(mday60.birthday, 5))>=60) 
	                                    order by age desc) as age60                                                
                                    from members m  
                                    left join region r on r.region_id=m.region_id
                                    left join district d on d.district_id=m.district_id
                                    left join sex sx on sx.sex_id=m.sex_id
									group by m.district_id,m.region_id  
                      ";
        return DB::select($sql);
    }


    public function getMembersBptCounter(){
        $u_ = Auth::user();
        $r_id = $u_->role_id;
        if($r_id==1){//gathering data for region
            $sql="select r.region_name,r.region_id as regionId,d.district_id as districtId,bp.bpt_id as bptId,d.district_name,(select count(bp.bpt_id) from bpt bp) as bptcount,count(m.bpt_id) as ismember
                                from members m
								left join region r on r.region_id=m.region_id
								left join users u on u.region_id=m.region_id
								left join district d on d.district_id=m.district_id
								left join bpt bp on bp.bpt_id=m.bpt_id
								where m.region_id = $u_->region_id
								group by m.region_id,m.district_id
								order by count(m.bpt_id) desc";
            return DB::select($sql);
        }

        if($r_id==2) {//gathering data for district
            $sql = "select r.region_name,d.district_name,(select count(bp.bpt_id) from bpt bp) as bptcount,count(m.bpt_id) as ismember
                                from members m
								left join region r on r.region_id=m.region_id
								left join users u on u.region_id=m.region_id
								left join district d on d.district_id=m.district_id
								left join bpt bp on bp.bpt_id=m.bpt_id
								group by m.region_id,m.district_id
								order by count(m.bpt_id) desc";
            return DB::select($sql);
        }
        if($r_id==3) {//gathering data for republic
            $sql = "select r.region_name,d.district_name,(select count(bp.bpt_id) from bpt bp) as bptcount,count(m.bpt_id) as ismember
                                from members m
								left join region r on r.region_id=m.region_id
								left join users u on u.region_id=m.region_id
								left join district d on d.district_id=m.district_id
								left join bpt bp on bp.bpt_id=m.bpt_id
								group by m.region_id,m.district_id
								order by count(m.bpt_id) desc";
            return DB::select($sql);
        }
    }


    public function getBptXdpInfo(){
        $sql="select bp.bpt_name,count(m.bpt_id) as bpcount,DATE_FORMAT(bp.bpt_establish_date,'%Y') as esdate,bp.bpt_address,m.fullName,m.birthday,m.specialist,m.homeaddress,m.workPlaceAndPosition,m.phoneNumber  from members m 
							left join bpt bp on bp.bpt_id=m.bpt_id
					     group by m.bpt_id,m.id";
        return DB::select($sql);
    }

    public function getBptSpecial(){
        $sql="select bp.bpt_name,count(bp.bpt_id) as bptcount ,(select count(*) from bpt bp1 where (bp1.bpt_is_mfy is null and bp1.bpt_id=m.bpt_id)) as bpt_mfy,
						(IF(bp.bpt_speciality_id=1,count(bp.bpt_speciality_id),0)) as ishlabchiqarish,
						(IF(bp.bpt_speciality_id=2,count(bp.bpt_speciality_id),0)) as qishloq,
				  	(IF(bp.bpt_speciality_id=3,count(bp.bpt_speciality_id),0)) as xizmat,
				    (IF(bp.bpt_speciality_id=4,count(bp.bpt_speciality_id),0)) as sogliq
					
					from bpt bp 
					left join members m on m.bpt_id=bp.bpt_id
					left join region r on r.region_id=m.region_id
					left join district d on d.district_id=m.district_id
					left join bpt_species bps on bps.id=bp.bpt_speciality_id
					group by bp.bpt_id";
        return DB::select($sql);
    }

    public function getMembersReports(){
        $sql="select d.district_name,count(m.id) as memcount,(select count(*) from bpt bp1) as bptcount,round((count(m.id)/(select count(*) from bpt bp1))) as memprecent,
		 (select count(s.sex_id) from members s where s.sex_id=1) as womtotal,
		 (select count(s.sex_id) from members s where s.sex_id=2) as mentotal
    
		     from members m
						  left join bpt bp on bp.bpt_id=m.bpt_id
							left join region r on r.region_id=m.region_id
							left join district d on d.district_id=m.district_id
							group by m.district_id";
        return DB::select($sql);
    }


}
