<?php

namespace common\models;

use common\models\one_c\User;
use Yii;

/**
 * This is the model class for table "nps_answer".
 *
 * @property int $id
 * @property string|null $text_1
 * @property string|null $text_2
 * @property int $question_1
 * @property int $question_2
 * @property int $question_3
 * @property int $question_4
 * @property int $question_5
 * @property int $question_6
 * @property int $question_7
 * @property int $question_8
 * @property int $question_9
 * @property int $question_10
 * @property int $question_11
 * @property int $question_12
 * @property int $question_13
 * @property int $question_14
 * @property int $question_15
 * @property int $question_16
 * @property int $question_17
 * @property int $question_18
 * @property int $question_19
 * @property int $question_20
 * @property int $question_21
 * @property int $question_22
 * @property int $question_23
 * @property int $question_24
 * @property int $question_25
 * @property int $question_26
 * @property int $question_27
 * @property int $question_28
 * @property int $question_29
 * @property int $question_30
 * @property int $user_id
 */
class NpsAnswer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nps_answer';
    }

    public static function getStatistic($date1, $date2)
    {
        $connection = Yii::$app->getDb();
        $questionsQuery = "";
        for ($i = 1; $i <= 30; $i++) {
            $questionsQuery .= "
            (SELECT COUNT(id) FROM nps_answer WHERE question_{$i} BETWEEN 0 AND 7 AND created_at BETWEEN :date1 AND :date2) AS question_{$i}_low_count,
            (SELECT COUNT(id) FROM nps_answer WHERE question_{$i} BETWEEN 7 AND 8 AND created_at BETWEEN :date1 AND :date2) AS question_{$i}_avg_count,
            (SELECT COUNT(id) FROM nps_answer WHERE question_{$i} BETWEEN 9 AND 10 AND created_at BETWEEN :date1 AND :date2) AS question_{$i}_high_count,
            sum(question_{$i}) AS question_{$i}_sum,
            AVG(question_{$i}) AS question_{$i}_avg,";
        }
        $query = "
            SELECT 
            $questionsQuery
            COUNT(id) AS nps_count
            FROM nps_answer 
            WHERE created_at BETWEEN :date1 AND :date2;
        ";
        $command = $connection->createCommand($query)
            ->bindValue(':date1', $date1)
            ->bindValue(':date2', $date2);
        $result = $command->queryOne();
        for ($i = 1; $i <= 30; $i++) {
            $result["question_{$i}_count"] = $result["question_{$i}_low_count"] + $result["question_{$i}_avg_count"] + $result["question_{$i}_high_count"];
        }
        return $result;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text_1', 'text_2'], 'string'],
            [['question_1'], 'required'],
            [['question_1', 'question_2', 'question_3', 'question_4', 'question_5', 'question_6', 'question_7', 'question_8', 'question_9', 'question_10', 'question_11', 'question_12', 'question_13', 'question_14', 'question_15', 'question_16', 'question_17', 'question_18', 'question_19', 'question_20', 'question_21', 'question_22', 'question_23', 'question_24', 'question_25', 'question_26', 'question_27', 'question_28', 'question_29', 'question_30'],
                'integer', 'min' => 0, 'max' => 10],
            [['created_at'], 'safe'],
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text_1' => 'Text 1',
            'text_2' => 'Text 2',
            'question_1' => 'Question 1',
            'question_2' => 'Question 2',
            'question_3' => 'Question 3',
            'question_4' => 'Question 4',
            'question_5' => 'Question 5',
            'question_6' => 'Question 6',
            'question_7' => 'Question 7',
            'question_8' => 'Question 8',
            'question_9' => 'Question 9',
            'question_10' => 'Question 10',
            'question_11' => 'Question 11',
            'question_12' => 'Question 12',
            'question_13' => 'Question 13',
            'question_14' => 'Question 14',
            'question_15' => 'Question 15',
            'question_16' => 'Question 16',
            'question_17' => 'Question 17',
            'question_18' => 'Question 18',
            'question_19' => 'Question 19',
            'question_20' => 'Question 20',
            'question_21' => 'Question 21',
            'question_22' => 'Question 22',
            'question_23' => 'Question 23',
            'question_24' => 'Question 24',
            'question_25' => 'Question 25',
            'question_26' => 'Question 26',
            'question_27' => 'Question 27',
            'question_28' => 'Question 28',
            'question_29' => 'Question 29',
            'question_30' => 'Question 30',
        ];
    }
}
