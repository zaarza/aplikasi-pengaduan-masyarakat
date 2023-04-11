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

function toggleAddComplaintModal() {
  document.getElementById("complaintModalTitle").innerHTML = "Tambah aduan";

  document
    .getElementById("complaintModalForm")
    .setAttribute(
      "action",
      "http://localhost:81/aplikasi-pengaduan-masyarakat/public/Index/addComplaint"
    );
  document.getElementById("complaintModalFormTitle").value = "";
  document.getElementById("complaintModalFormDescription").value = "";
  document.getElementById("complaintModalFormLocation").value = "";
  document
    .getElementById("complaintModalFormImagePreview")
    .setAttribute("src", ``);
  document
    .getElementById("complaintModalFormImagePreview")
    .classList.add("visually-hidden");
  document.getElementById("complaintModalFormSubmit").textContent = "Tambah";
}

function toggleUpdateComplaintModal() {
  document.getElementById("complaintModalTitle").innerHTML = "Ubah aduan";

  const xhr = new XMLHttpRequest();

  xhr.onreadystatechange = () => {
    if (xhr.readyState === 4 && xhr.status === 200) {
      const data = JSON.parse(xhr.response);
      console.log(data);

      document
        .getElementById("complaintModalForm")
        .setAttribute(
          "action",
          "http://localhost:81/aplikasi-pengaduan-masyarakat/public/Index/updateComplaint"
        );
      document.getElementById("complaintModalFormTitle").value = data.title;
      document.getElementById("complaintModalFormDescription").value =
        data.description;
      document.getElementById("complaintModalFormLocation").value =
        data.location;
      document
        .getElementById("complaintModalFormImagePreview")
        .setAttribute(
          "src",
          `http://localhost:81/aplikasi-pengaduan-masyarakat/public/assets/images/uploaded/${data.image}`
        );
      document
        .getElementById("complaintModalFormImagePreview")
        .classList.remove("visually-hidden");
      document.getElementById("complaintModalFormSubmit").textContent =
        "Simpan";
    }
  };

  xhr.open(
    "POST",
    "http://localhost:81/aplikasi-pengaduan-masyarakat/public/Index/getComplaintDetail"
  );
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send(`id=${event.target.getAttribute("data-id")}`);
}

function toggleDetailComplaintModal() {
  document.getElementById("complaintModalTitle").innerHTML = "Detail aduan";
}
