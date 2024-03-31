<?php
namespace App\Services;

use Google\Cloud\Firestore\FieldValue;

class FirestoreApiService
{
    protected $db;

    public function __construct()
    {
        $this->db = app('firebase.firestore')->database();
    }

    /**
     * firestoreへのデータset
     * @param sender_id int
     * @param room_id int
     * @param comment string
     * @return void
     */
    public function storeComment($sender_id, $room_id, $comment_id ,$comment)
    {
        $docRef = $this->db->collection('rooms')->document($room_id)->collection('comment');

        $docRef->document($comment_id)->set([
            'comment' => $comment,
            'sender_id' => $sender_id,
            'created_at' => FieldValue::serverTimestamp(),
            'updated_at' => FieldValue::serverTimestamp(),
        ]);
    }

    /**
     * firestoreのデータをupdate
     * @param sender_id int
     * @param room_id int
     * @param comment_id int
     * @param comment string
     * @return void
     */
    public function updateComment($sender_id, $room_id, $comment_id, $comment)
    {
        $docRef = $this->db->collection('rooms')->document($room_id)->collection('comment');

        $docRef->document($comment_id)->update([
            [ 'path' => 'comment', 'value' => $comment],
            ['path' => 'updated_at', 'value' => FieldValue::serverTimestamp()]
        ]);
    }

    /**
     * firestoreのデータをdelete
     * @param room_id int
     * @param comment_id int
     * @return void
     */
    public function deleteComment($room_id, $comment_id)
    {
        $docRef = $this->db->collection('rooms')->document($room_id)->collection('comment');

        $docRef->document($comment_id)->delete();
    }

}
