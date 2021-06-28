<?php
/**
* @OA\Get(path="/scores",
*     @OA\Response(response="200", description="List of scores from database")
* )
*/
Flight::route('GET /scores', function(){
  Flight::json(Flight::scoreDao()->get_all_scores());
});
/**
 * @OA\Get(path="/score/{id}",
 *    @OA\Parameter(@OA\Schema(type="integer"), in="path", allowReserved=true,name="id", default=1),
 *     @OA\Response(response="200", description="Score from database based on id")
 * )
 */
Flight::route('GET /score/@id', function($id){
    Flight::json(Flight::scoreDao()->get_score_by_id($id));
});

 ?>
