<?php
class Index extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['user'])) {
            $data['title'] = 'Beranda';
            $this->view("templates/header", $data);
            $this->view("Index/index");
            $this->view("templates/footer");
        } else {
            if ($_SESSION['user']['userLevel'] == 0) {
                $model = $this->model("Complaint_Model");

                $data['title'] = 'Beranda';
                $data['complaints'] = $model->getCurrentUserComplaint();

                $this->view("templates/header", $data);
                $this->view("Index/public/index", $data);
                $this->view("templates/footer");
            } else if ($_SESSION['user']['userLevel'] == 1) {
                $model = $this->model("Complaint_Model");
                $data['title'] = 'Beranda';

                $data['complaints'] = $model->getAllComplaints();
                $this->view("templates/header", $data);
                $this->view("Index/admin/index", $data);
                $this->view("templates/footer");
            }
        }
    }

    public function addComplaint()
    {
        $model = $this->model("Complaint_Model");

        if ($model->addComplaint($_POST, $_FILES)) {
            Flasher::setFlash("Berhasil menambah aduan", "success");
            header('Location:' . BASE_URL . '/');
            exit;
        } else {
            Flasher::setFlash('Gagal menambahkan aduan! ' . $model->getErrorMessage(), "danger");
            header('Location:' . BASE_URL . '/');
            exit;
        }

        $model->addComplaint($_POST, $_FILES);
    }

    public function detail($id)
    {
        $complaintModel = $this->model("Complaint_Model");
        $responsesModel = $this->model("Response_Model");

        $data['title'] = "Detail";
        $data['complaint'] = $complaintModel->getDetailComplaint($id);
        $data['responses'] = $responsesModel->getCurrentComplaintResponses($id);

        if (intval($_SESSION['user']['userLevel']) === 0) {
            $this->view("templates/header", $data);
            $this->view("Index/public/detail", $data);
            $this->view("templates/footer");
        } else if (intval($_SESSION['user']['userLevel']) === 1) {
            $this->view("templates/header", $data);
            $this->view("Index/admin/detail", $data);
            $this->view("templates/footer");
        }
    }

    public function update($id)
    {
        if (intval($_SESSION['user']['userLevel']) !== 0) {
            header('Location: ' . BASE_URL);
            exit;
        }

        $complaintModel = $this->model("Complaint_Model");

        $data['title'] = "Update";
        $data['complaint'] = $complaintModel->getDetailComplaint($id);

        $this->view("templates/header", $data);
        $this->view("Index/public/update", $data);
        $this->view("templates/footer");
    }

    public function addResponse($complaintId)
    {
        $model = $this->model("Response_Model");

        if ($model->addResponse($complaintId, $_POST) > 0) {
            Flasher::setFlash("Berhasil menambahkan tanggapan!", "success");
            header('Location: ' . BASE_URL);
            exit;
        } else {
            Flasher::setFlash("Gagal menambahkan tanggapan!", "failed");
            header('Location: ' . BASE_URL);
            exit;
        }
    }

    public function getComplaintDetail()
    {
        $model = $this->model("Complaint_Model");
        $data = $model->getDetailComplaint($_POST['id']);

        echo json_encode($data);
    }

    public function updateComplaint($id)
    {
        $model = $this->model("Complaint_Model");
        $_POST['id'] = $id;

        if ($model->updateComplaint($_POST, $_FILES) > 0) {
            Flasher::setFlash('Berhasil mengubah aduan!', "success");
            header('Location:' . BASE_URL);
            exit;
        } else {
            Flasher::setFlash('Gagal mengubah aduan!', "danger");
            header('Location:' . BASE_URL);
            exit;
        }
    }

    public function deleteComplaint($id)
    {
        $model = $this->model("Complaint_Model");
        $model->deleteComplaint($id);

        Flasher::setFlash('Berhasil menghapus aduan!', "success");
        header('Location:' . BASE_URL . '/');
        exit;
    }

    public function deleteMultipleComplaint()
    {
        $model = $this->model("Complaint_Model");
        $complaints = $_POST['complaints'] ?? [];

        foreach ($complaints as $complaint) {

            $model->deleteComplaint($complaint);
        }

        Flasher::setFlash('Berhasil menghapus aduan!', "success");
        header('Location:' . BASE_URL . '/');
        exit;
    }

    public function markComplaint($id, $status)
    {
        $model = $this->model("Complaint_Model");

        if ($model->markComplaint($id, $status) > 0) {
            Flasher::setFlash('Berhasil menandai aduan!', "success");
            header('Location:' . BASE_URL . '/');
            exit;
        } else {
            Flasher::setFlash('Gagal menandai aduan!', "danger");
            header('Location:' . BASE_URL . '/');
            exit;
        }
    }
}
