function checkAllComplaints(event) {
  const complaints = Array.from(document.getElementsByClassName("complaints"));
  complaints.forEach((complaint) => {
    if (event.target.checked) {
      complaint.checked = true;
    } else {
      complaint.checked = false;
    }
  });
}
