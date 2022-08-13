CREATE VIEW `viewappoinments` AS 
 select `pa`.`Names` AS `Names`,date_format(`pa`.`BOD`,'%m/%d/%Y') AS `Dateofbirth`,`pa`.`NumberPhone1` AS `NumberPhone1`,
 `pa`.`NumberPhone2` AS `NumberPhone2`,`pa`.`PatientAddress` AS `PatientAddress`,date_format(`ap`.`return_time`,'%h:m% %p') AS `Time`,
 `mc`.`AddressMedicalC` AS `AddressMedicalC`,`mc`.`Name` AS `Name`,`ap`.`outside_center_name` AS `SpecialistName`,
 `mc`.`NumberPhone` AS `NumberPhone`,`ap`.`attention_type` AS `TypeVisit`,`ap`.`special_requeriment` AS `SpecialTransportation`,
 date_format(`ap`.`Time`,'%m/%d/%Y') AS `dropoff` 
 from ((`ges_appoinments` `ap` join `patients` `pa` on(`ap`.`Id` = `pa`.`Id`)) 
  join `medical_centers` `mc` on(`ap`.`Id` = `mc`.`IdMedicalC`));