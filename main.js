
$(".btnedit").click(e=>{
  let textvalues=displayData(e);

  let std_id=$("input[name*='std_id']");
  let studentname=$("input[name*='std_name']");
  let studentphone=$("input[name*='std_phone']");
  let studentrollno=$("input[name*='std_rollno']");
  let studentprogram=$("select[name*='class_id']");

  std_id.val(textvalues[0]);
  studentname.val(textvalues[1]);
  studentphone.val(textvalues[2]);
  studentrollno.val(textvalues[3]);
  studentprogram.val(textvalues[4]);
});

function displayData(e){
  let id=0;
  const td=$("#tbody tr td");
  let textvalues=[];

  for (const value of td) {
    if (value.dataset.std_id == e.target.dataset.std_id) {
      textvalues[id++]=value.textContent;
    }
  }
  return textvalues;
}
