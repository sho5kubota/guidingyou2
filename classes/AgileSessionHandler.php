<?php /*
///-build_id: 2015042222.1245
/// This source file is subject to the Software License Agreement that is bundled with this 
/// package in the file license.txt, or you can get it here
/// http://addons-modules.com/store/en/content/3-terms-and-conditions-of-use
///
/// @copyright  2009-2012 Addons-Modules.com
///
*/
${"\x47L\x4f\x42\x41\x4c\x53"}["\x6d\x68o\x73\x63\x67v\x62"]="\x73\x65\x63\x6f\x6e\x64\x73";${"\x47\x4c\x4f\x42A\x4cS"}["bbwq\x6e\x77\x69bmo"]="\x64\x61\x74a";${"G\x4c\x4fB\x41\x4cS"}["r\x6e\x71\x72\x6d\x6b\x64"]="i\x64";${"\x47\x4c\x4f\x42\x41\x4cS"}["\x69\x74\x67te\x6f\x79n\x65f"]="\x73d";class AgileSessionHandler{private$sd;public function __construct(AgileSessionData$sd=null){if(isset(${${"\x47L\x4fBA\x4c\x53"}["i\x74g\x74e\x6f\x79n\x65\x66"]})){$vasmmuk="\x73\x64";$this->sd=${$vasmmuk};}else{$this->sd=new AgileSessionData();}}public function open($path,$name){$sid=Tools::getValue("s\x69\x64");if(!empty($sid))session_id($sid);return true;}public function close(){return true;}public function read($id){return$this->sd->get(${${"\x47\x4cO\x42AL\x53"}["r\x6e\x71\x72\x6d\x6bd"]});}public function write($id,$data){return$this->sd->set(${${"\x47\x4c\x4f\x42A\x4c\x53"}["rnqrmkd"]},${${"\x47L\x4fBA\x4c\x53"}["\x62\x62\x77q\x6e\x77i\x62\x6d\x6f"]});}public function gc($seconds){return$this->sd->clean(${${"\x47L\x4f\x42\x41\x4cS"}["m\x68o\x73\x63\x67v\x62"]});}public function destroy($id){return$this->sd->delete(${${"GL\x4f\x42\x41\x4c\x53"}["\x72n\x71r\x6dk\x64"]});}public function __destruct(){session_write_close();}}
?>