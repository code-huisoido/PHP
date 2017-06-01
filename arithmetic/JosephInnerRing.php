<?php
/**
 * 约瑟夫内环算法
 * 10个人围成一个圆圈，编号为1~10，从第一号开始报数，报到3的倍数的人离开， 一直数下去，直到最后只有一个人， 求此人编号
 * @Author dinghui
 */
class JosephInnerRing {
    
    public $_people = [];

    /**
     * 返回最后一个编号的方法
     */
    private function getLastNumber($numbers) {
        for ($i = 1; $i <= $numbers; $i++) {
            array_push($this->_people, $i);
        }
        $people = $this->_people;
        $count = count($people);
        while ($count >= 3) {
            echo "报数: ";
            foreach ($people as $k => $v) {
                $k += 1;
                if ($k % 3 == 0) {
                    echo $k."(".$v."离开)";
                    $index = $k - 1;
                    unset($people[$index]);
                    break;
                }
                echo $k."(".$v.") &nbsp;&nbsp;&nbsp;";
            }
            echo "<br/>";
            $people = array_values($people);
            $tempArr = array_slice($people, $index);
            for ($i = 0; $i < $index; $i++) {
                array_push($tempArr, $people[$i]);
            }

            $people = $tempArr;
            $count = count($people);
        }

        echo "报数: ";
        echo '1('.$people[0].")&nbsp;&nbsp;&nbsp; 2(".$people[1].")&nbsp;&nbsp;&nbsp; 3(".$people[0]."离开)";
        echo "<br/>";
        return $people[1];
    }

    public function main($numbers) {
        $numbers = intval($numbers);
        if ($numbers < 2) {
            echo "请输入大于两个人数！";
            die;
        }
        echo "<b>最后一个人的编号: ".$this->getLastNumber($numbers)."</b>";
    }
}


if (isset($_POST['numbers'])) {
    $numbers = $_POST['numbers'];
    $obj = new JosephInnerRing();
    $obj->main($numbers);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>算法系列</title>
</head>
<body>
    <h2>约瑟夫内环算法</h2>
    <p>要求：n个人围成一个圆圈，编号为1~n，从第一号开始报数，报到3的倍数的人离开， 一直数下去，直到最后只有一个人， 求此人编号？</p>
    <form method="post" action="./JosephInnerRing.php">
        <input type="text" value="" placeholder="请输入人数" name="numbers">
        <input type="submit" value="提交">
    </form>
</body>
</html>