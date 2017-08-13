<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    /**
     * This method will fetch all questions 10 rec pagination
     * @return string
     */
    public function getAllQuestion()
    {
        try {
            $allQestions = $this
                ->get()
                ->take(10)
                ->toArray(); 
            return $allQestions;

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * This method will fetch a specific question
     * @param $id
     * @return string
     */
    public function getQuestionDetails($id)
    {
        try {
            $questionDetails = Question::
                where([
                    ['id', $id]
                ])
                ->get()
                ->toArray();
            return $questionDetails;

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
