<?php

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Datasource\Exception;

/**
 * Exams Controller
 *
 * @property \App\Model\Table\ExamsTable $Exams
 *
 * @method \App\Model\Entity\Exam[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExamsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Classrooms']
        ];
        $exams = $this->paginate($this->Exams);

        $this->set(compact('exams'));
    }

    /**
     * View method
     *
     * @param string|null $id Exam id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->loadModel('StudentsExams');
        $exam = $this->Exams->get($id, [
            'contain' => ['Classrooms']
        ]);

        $studentsInExam = $this->StudentsExams->find('all', [
            'conditions' => ['exam_id' => $exam->id],
            'contain' => ['Students']
        ]);

        $exam->students_exams = $studentsInExam;

        $this->set('exam', $exam);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $exam = $this->Exams->newEntity();
        if ($this->request->is('post')) {

            $exam = $this->Exams->patchEntity($exam, $this->request->getData());

            $findStudentsInClassroom = $this->Exams->Classrooms->get($this->request->getData('classroom_id'), [
                'contain' => ['StudentClassroom']
            ]);

            if ($findStudentsInClassroom) {
                if (empty($findStudentsInClassroom->student_classroom)) {
                    $this->Flash->error(__('no students in this course, first add students'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    if ($this->Exams->save($exam)) {
                        $this->Flash->success(__('exam created'));
                        return $this->redirect(['action' => 'students', $exam->id, $exam->classroom_id]);
                    }
                }
            }
        }

        $classrooms = $this->Exams->Classrooms->find('list', ['limit' => 200]);
        $this->set(compact('exam', 'classrooms'));
    }

    public function students($examId, $classroomId)
    {
        $this->loadModel('Students');
        $this->loadModel('StudentsExams');

        $exam = $this->Exams->get($examId);

        $findStudentsInClassroom = $this->Exams->Classrooms->get($classroomId, [
            'contain' => ['StudentClassroom']
        ]);

        $students = array();

        foreach ($findStudentsInClassroom->student_classroom as $item) {
            $_exam = $this->StudentsExams->find('all', ['conditions' => ['student_id' => $item->student_id, 'exam_id' => $examId]])->first();
            $student = $this->Students->get($item->student_id);
            $student->exam = $_exam;
            array_push($students, $student);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {


            $studentExam = $this->StudentsExams->find('all', [
                'conditions' => ['student_id' => $this->request->getData('student_id'), 'exam_id' => $examId]
            ])->first();
            $studentExam->score = $this->request->getData('score');

            if ($this->StudentsExams->save($studentExam)) {
                $this->Flash->success(__('The score has been saved.'));

                return $this->redirect(['action' => 'students', $examId, $classroomId]);
            }
        }

        $this->set(compact('exam', 'classroomId', 'students'));
    }

    public function addStudentToExam($studentId, $examId, $classroomId)
    {
        $this->loadModel('StudentsExams');

        $this->request->allowMethod(['post']);
        $exam = $this->StudentsExams->newEntity();
        $exam->student_id = $studentId;
        $exam->exam_id = $examId;
        if ($this->StudentsExams->save($exam)) {
            $this->Flash->success(__('Student added to exam.'));
        } else {
            $this->Flash->error(__('Could not add student to exam. Please, try again.'));
        }
        return $this->redirect(['action' => 'students', $examId, $classroomId]);
    }

    /**
     * Edit method
     *
     * @param string|null $id Exam id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $exam = $this->Exams->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $exam = $this->Exams->patchEntity($exam, $this->request->getData());
            if ($this->Exams->save($exam)) {
                $this->Flash->success(__('The exam has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The exam could not be saved. Please, try again.'));
        }
        $classrooms = $this->Exams->Classrooms->find('list', ['limit' => 200]);
        $this->set(compact('exam', 'classrooms'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Exam id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $exam = $this->Exams->get($id);
        if ($this->Exams->delete($exam)) {
            $this->Flash->success(__('The exam has been deleted.'));
        } else {
            $this->Flash->error(__('The exam could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
