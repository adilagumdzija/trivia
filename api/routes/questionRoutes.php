<?php
/**
* @OA\Get(path="/questions",
*     @OA\Response(response="200", description="List of questions from database")
* )
*/
    Flight::route('GET /questions', function(){
    Flight::json(Flight::questionDao()->get_all_questions());
});
/**
 * @OA\Get(path="/questions/{id}",
 *    @OA\Parameter(@OA\Schema(type="integer"), in="path", allowReserved=true,name="id", default=1),
 *     @OA\Response(response="200", description="Question from database based on id")
 * )
 */
Flight::route('GET /questions/@id', function($id){
    Flight::json(Flight::questionDao()->get_question_by_id($id));
});
/**
* @OA\Get(path="/answersfromquestions",
*     @OA\Response(response="200", description="answers of questions from database")
* )
*/
Flight::route('GET /answersfromquestions', function(){
    Flight::json(Flight::questionDao()->get_answers());
});
?>
