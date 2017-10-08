<?php
/**
 * Created by PhpStorm.
 * User: troub
 * Date: 2017/3/15
 * Time: 22:55
 */
use Workerman\Worker;
require_once __DIR__ . '/Workerman/Autoloader.php';
require_once __DIR__.'/mysql/src/Connection.php';

$chengyu1=array(            //存储成语的数组
    '图穷匕首',
    '不足为训',
    '丰城剑气',
    '人人自危',
    '宿世冤家',
    '温人之周',
    '口若悬河',
    '口蜜腹剑',
    '不名一钱',
    '犁庭扫穴',
    '木牛流马',
    '掷果潘安',
    '文过饰非',
    '不胫而走',
    '三折其肱',
    '博闻强识',
    '尸位素餐',
    '东阁待贤',
    '三令五申',
    '变徵之声',
    '与狐谋皮',
    '尸居余气',
    '万马齐喑',
    '犬牙交错',
    '三纸无驴',
    '口血未干',
    '怀瑾握瑜',
    '才多识寡',
    '弹冠相庆',
    '以邻为壑',
    '庆父不死,鲁难未已',
    '大腹便便',
    '千夫所指',
    '础润知雨',
    '彭泽横琴',
    '水深火热',
    '一洞之网',
    '大巧若拙',
    '中流砥柱',
    '无所畏忌',
    '切齿拊心',
    '不逞之徒',
    '入室操戈',
    '八面威风',
    '推舟于陆',
    '投鞭断流',
    '不识时务',
    '火树银花',
    '强者反己',
    '井底之蛙',
    '为富不仁',
    '日暮途穷',
    '道路以目',
    '比肩接踵',
    '曾几何时',
    '陈言务去',
    '安土重迁',
    '木人石心',
    '椎心泣血',
    '内助之贤',
    '三叠阳关',
    '开诚布公',
    '指腹为婚',
    '如嚼鸡肋',
    '不辨菽麦',
    '无出其右',
    '积毁销骨',
    '牛衣对泣',
    '弃甲曳兵',
    '卑礼厚币',
    '如椽之笔',
    '悬悬而望',
    '长门买赋',
    '曲突徙薪',
    '风驰电掣',
    '千里鹅毛',
    '沐猴而冠',
    '风声鹤唳',
    '洋洋大观',
    '投鼠忌器',
    '表里山河',
    '不经之谈',
    '飞黄腾达',
    '危言危行',
    '余勇可贾',
    '饮鸩止渴',
    '左提右挈',
    '曲高和寡',
    '亡在旦夕',
    '广陵散绝',
    '了如指掌',
    '犬马之劳',
    '含英咀华',
    '胸无城府',
    '天真烂漫',
    '为渊驱鱼',
    '三迁之教',
    '千钧一发',
    '批亢捣虚',
    '奋臂大呼',
    '一斛凉州',
    '席不暇暖',
    '韦编三绝',
    '以古非今',
    '以逸待劳',
    '不稂不莠',
    '专横跋扈',
    '故态复萌',
    '相濡以沫',
    '双管齐下',
    '茕茕独立',
    '东坡画扇',
    '引短推长',
    '无能为役',
    '天衣无缝',
    '不以为意',
    '虚与委蛇',
    '见微知著',
    '下马作威',
    '庖丁解牛',
    '万众一心',
    '方寸已乱',
    '以卵击石',
    '万死不辞',
    '分庭抗礼',
    '择善而从',
    '千金市骨',
    '指桑骂槐',
    '日行千里',
    '得鱼忘筌',
    '割须换袍',
    '宵衣旰食',
    '犬牙相错',
    '三千珠履',
    '挂一漏万',
    '大笔如椽',
    '千虑一得',
    '水火无交',
    '专心致志',
    '千变万化',
    '分庭抗礼',
    '久假不归',
    '无稽之谈',
    '扫墓望丧',
    '囊血射天',
    '火中取栗',
    '子虚乌有',
    '风吹草动',
    '天花乱坠',
    '暮夜无知',
    '尺短寸长',
    '五色无主',
    '下车泣罪',
    '不孚众望',
    '目无全牛',
    '三省吾身',
    '尸位素餐',
    '得见青天',
    '弊帚自珍',
    '庄生梦蝶',
    '三折其肱',
    '忝列门墙',
    '吃闭门羹',
    '偃鼠饮河',
    '火树银花',
    '上下其手',
    '不遗余力',
    '千军万马',
    '大放厥词',
    '风烛残年',
    '三生有幸',
    '五风十雨',
    '匹夫之勇',
    '山崩钟应',
    '天下无双',
    '惨淡经营',
    '振臂一呼',
    '水落石出',
    '振聋发聩',
    '牛衣对泣',
    '为人作嫁',
    '沧海横流',
    '归遗细君',
    '门庭若市',
    '令行禁止',
    '两贤相厄',
    '七月流火',
    '屐齿之折',
    '以管窥天',
    '干将莫邪',
    '分道扬镳',
    '韦编三绝',
    '天夺之魄',
    '吉光片羽',
    '拿腔作势',
    '门墙桃李',
    '亡命之徒',
    '抉目东门',
    '老骥伏枥',
    '光恶不善',
    '殷鉴不远',
    '蔚为大观',
    '拾带重还',
    '望其项背',
    '捭阖纵横',
    '亡戟得矛',
    '及瓜而代',
    '不合时宜',
    '干卿底事',
    '飞短流长',
    '马革裹尸',
    '如坐春风',
    '秋毫不犯',
    '千载难逢',
    '山公倒载',
    '不求甚解',
    '偶语弃市',
    '一曝十寒',
    '等量齐观',
    '义不容辞',
    '广开言路',
    '延津剑合',
    '宵衣旰食',
    '错彩镂金',
    '三人成虎',
    '未雨绸缪',
    '人琴俱亡',
    '嗜痂成癖',
    '下车伊始',
    '天经地义',
    '什袭以藏',
    '击壤而歌',
    '飞蛾扑火',
    '蚕食鲸吞',
    '门可罗雀',
    '车载斗量',
    '犯而不校',
    '以貌取人',
    '大相径庭',
    '巧断鸳鸯',
    '好为人师',
    '小时了了',
    '今是昨非',
    '小题大作',
    '牛角挂书',
    '人弃我取',
    '乌合之众',
    '弄玉吹箫',
    '计日程功',
    '不堪回首',
    '拾人牙慧',
    '张敞画眉',
    '峥嵘岁月',
    '为虎作伥',
    '义不帝秦',
    '一蛇吞象',
    '戚戚具尔',
    '醍醐灌顶',
    '白驹过隙',
    '躬逢其盛',
    '日薄西山',
    '无可奈何',
    '下笔成章',
    '篝火狐鸣',
    '土崩瓦解',
    '披肝沥胆',
    '上行下效',
    '得陇望蜀',
    '气壮山河',
    '信笔涂鸦',
    '刻鹄类鹜',
    '五日京兆',
    '不知所云',
    '不耻下问',
    '天涯海角',
    '席地而坐',
    '变化无方',
    '方寸之地',
    '万人空巷',
    '文不加点',
    '亡羊补牢',
    '炊沙做饭',
    '抱残守缺',
    '大笔如椽',
    '蓊蓊郁郁',
    '分崩离析',
    '烜赫一时',
    '木石人心',
    '好好先生',
    '史策丹心',
    '小心翼翼',
    '锱铢必较',
    '南阳三葛',
    '无所不能',
    '挂冠归去',
    '包胥之哭',
    '左右开弓',
    '不通世务',
    '大而无当',
    '不可多得',
    '升堂入室',
    '开源节流',
    '飞将数奇',
    '以邻为壑',
    '画虎类犬',
    '不因人热',
    '虚与委蛇',
    '反侧自安',
    '三分鼎足',
    '七步之才',
    '紫芝眉宇',
    '凿壁借光',
    '三寸之舌',
    '下里巴人',
    '不贪为宝',
    '勤以立身',
    '伐功矜能',
    '七擒七纵',
    '引锥刺股',
    '召父杜母',
    '平步青云',
    '不可救药',
    '不伦不类',
    '斗粟尺布',
    '不足回旋',
    '人浮于事',
    '无所适从',
    '俯拾即是',
    '中饱私囊',
    '予取予求',
    '十羊九牧',
    '洞若观火',
    '金科玉律',
    '泥沙俱下',
    '千里命驾',
    '木人石心',
    '廉泉让水',
    '见怪不怪',
    '五十步笑百步',
    '山河表里',
    '意兴阑珊',
    '长袖善舞',
    '与羊谋羞',
    '心旷神怡',
    '背水为阵',
    '日暮途远',
    '不屈不挠',
    '原宪桑枢',
    '阪上走丸',
    '濯濯童山',
    '公而忘私',
    '疾首蹙额',
    '与虎谋皮',
    '卜昼卜夜',
    '不刊之论',
    '以身试法',
    '一登龙门',
    '人浮于事',
    '弯弓饮羽',
    '人给家足',
    '雁过拔毛',
    '毫发不爽',
    '别出机杼',
    '物力维艰',
    '不二法门',

);

$chengyu2=array(
    '一衣带水',
    '作舍道旁',
    '厉兵秣马',
    '匠石运斤',
    '冯唐易老',
    '以邻为壑',
    '口出狂言',
    '倚马千言',
    '铸山煮海',
    '罄竹难书',
    '掷地有声',
    '卓尔不群',
    '秋风过耳',
    '啮雪餐毡',
    '浅尝辄止',
    '休戚相关',
    '与虎谋皮',
    '亦步亦趋',
    '穷且益坚',
    '助纣为虐',
    '颠扑不破',
    '糟糠之妻',
    '老态龙钟',
    '含饴弄孙',
    '仰人鼻息',
    '秘而不宣',
    '六韬三略',
    '响遏行云',
    '谨小慎微',
    '捉襟见肘',
    '作茧自缚',
    '入幕之宾',
    '买椟还珠',
    '如丧考妣',
    '白头如新',
    '首鼠两端',
    '一暴十寒',
    '枕戈待旦',
    '穷兵黩武',
    '满目疮痍',
    '白驹过隙',
    '指鹿为马',
    '唾壶击碎',
    '反求诸己',
    '一蹴而就',
    '罄竹难书',
    '董狐直笔',
    '目不交睫',
    '木梗之患',
    '负隅顽抗',
    '城狐社鼠',
    '草菅人命',
    '如椽大笔',
    '夙世冤家',
    '诟如不闻',
    '三荆同株',
    '百步穿杨',
    '一目十行',
    '不求甚解',
    '运筹帷幄',
    '口蜜腹剑',
    '郢书燕说',
    '短兵相接',
    '嗟来之食',
    '江郎才尽',
    '止戈为武',
    '枯鱼之肆',
    '屡试不爽',
    '名落孙山',
    '倒屣相迎',
    '不落窠臼',
    '拔山举鼎',
    '嫂溺叔援',
    '望门投止',
    '仰人鼻息',
    '长袖善舞',
    '吞炭漆身',
    '天网恢恢',
    '目光如炬'
);

$chengyu3=array(
    '黄粱美梦',
    '火中取栗',
    '债台高筑',
    '寿陵失步',
    '寸木岑楼',
    '一饭之德',
    '作威作福',
    '饮水思源',
    '大智若愚',
    '老蚌生珠',
    '筚路蓝缕',
    '缘木求鱼',
    '煮豆燃萁',
    '箪食壶浆',
    '得陇望蜀',
    '卜昼卜夜',
    '买椟还珠',
    '外强中干',
    '坐怀不乱',
    '刘郎前度',
    '前倨后恭',
    '作奸犯科',
    '鸟尽弓藏',
    '汗牛充栋',
    '宴安鸩毒',
    '冠山戴粒',
    '别无长物',
    '越俎代庖',
    '拾人牙慧',
    '管中窥豹',
    '狗尾续貂',
    '家徒壁立',
    '投鼠忌器',
    '举案齐眉',
    '唇亡齿寒',
    '开门揖盗',
    '始终不渝',
    '李代桃僵',
    '利令智昏',
    '尾生抱柱',
    '孤注一掷',
    '危如累卵',
    '瘗玉埋香',
    '东窗事发',
    '按图索骥',
    '吴下阿蒙',
    '对簿公堂',
    '纲挈目张',
    '孝悌忠信',
    '毁家纾难',
    '宵鱼垂化',
    '退避三舍',
    '不逞之徒',
    '爱屋及乌',
    '登堂入室',
    '纸上谈兵',
    '高屋建瓴',
    '庄生梦蝶',
    '中流击楫',
    '草菅人命',
    '据鞍读书',
    '沉鱼落雁',
    '家徒四壁',
    '涸辙之鲋',
    '涣然冰释',
    '拾人牙慧',
    '南州冠冕',
    '洛阳纸贵',
    '刚愎自用',
    '不分轩轾',
    '一枕南柯',
    '因噎废食',
    '井渫不食',
    '胶柱鼓瑟',
    '下马冯妇',
    '鞭长莫及',
    '安步当车',
    '耳提面命',
    '一馈十起',
    '开门揖盗',
    '为蛇画足',
    '倾筐倒庋',
    '爱鹤失众',
    '阳春白雪',
    '过门不入',
    '屠龙之技',
    '画虎类犬',
    '三告投杼',
    '专横跋扈',
    '不即不离',
    '钟鼎人家',
    '集腋成裘',
    '比肩接踵',
    '墨突不黔',
    '倒行逆施',
    '使酒骂座',
    '朝乾夕惕',
    '杯水车薪',
    '铄石流金',
    '枕戈待旦',
    '杯水车薪',
    '望洋兴叹',
    '吐哺辍洗',
    '安步当车',
    '过犹不及',
    '倒行逆施',
    '不逞之徒',
    '发奸擿伏',
    '呕心沥血',
    '噤若寒蝉',
    '披星戴月',
    '纲举目张',
    '运斤成风',
    '噤若寒蝉',
    '不容置喙',
    '不寒而栗',
    '抱薪救火',
    '阳春白雪',
    '斗粟尺布',
    '强弩之末',
    '色厉内荏',
    '道听途说',
    '从善如流',
    '自惭形秽',
    '燕雀处堂',
    '却金暮夜',
    '寿陵失步',
    '舍旧谋新',
    '差强人意',
    '沆瀣一气',
    '书空咄咄',
    '三人成虎',
    '梧鼠技穷',
    '因势利导',
    '明火执械',
    '穷兵黩武',
    '杜口裹足',
    '与虎谋皮',
    '金口木舌',
    '亡猿祸木',
    '孔席不暖',
    '十浆五馈',
    '无妄之灾',
    '郑人买履',
    '子虚乌有',
    '大放厥词',
    '图穷匕见',
    '后起之秀',
    '日不暇给',
    '负隅顽抗',
    '鳞次栉比',
    '东窗事发',
    '小黠大痴',
    '去食存信',
    '石破天惊',
    '大放厥词',
    '才高八斗',
    '城下之盟',
    '弹冠相庆',
    '本末倒置',
    '亡秦三户',
    '抱残守缺',
    '危于累卵',
    '马革裹尸',
    '始作俑者',
    '防微杜渐',
    '东施效颦',
    '车载斗量',
    '因地制宜',
    '暗度陈仓',
    '城下之盟',
    '不为已甚',
    '沆瀣一气',
    '大笔如椽',
    '指鹿为马', '山穷水尽',
    '白衣卿相',
    '长袖善舞',
    '长驱直入',
    '才占八斗',
    '寸木岑楼',
    '别具肺肠',
    '马首是瞻',
    '大方之家',
    '兴丞相叹',
    '并日而食',
    '月下老人',
    '逢人说项',
    '不得要领',
    '割席断交',
    '大功毕成',
    '白头如新',
    '推食解衣',
    '侧目而视',
    '尸位素餐',
    '挥戈回日',
    '千金买骨',
    '无所畏惧',
    '十面埋伏',
    '陈陈相因',
    '见猎心喜',
    '天罗地网',
    '河清海晏',
    '班荆道故',
    '不以为然',
    '一鞭先著',
    '见异思迁',
    '开门揖盗',
    '人鼠之叹',
    '喜结金兰',
    '箪食瓢饮',
    '不甚了了',
    '风起云飞',
    '目光如炬',
    '倚马可待',
    '霜露之疾',
    '一钱不值',
    '雪泥鸿爪',
    '开卷有益',
    '一厢情愿',
    '下笔成篇',
    '开天辟地',
    '带经而锄',
    '一蹴而就',
    '左提右挈',
    '千人所指',
    '日暮穷途',
    '写经换鹅',
    '抽薪止沸',
    '敝帚自珍',
    '不负众望',
    '小鸟依人',
    '万人之敌',
    '引狼入室',
    '博弈犹贤',
    '披肝沥胆',
    '余光分人',
    '洞若观火',
    '韦编三绝',
    '鹬蚌相争',
    '开诚布公',
    '捉襟见肘',
    '人琴俱亡',
    '俯拾皆是',
    '壮士解腕',
    '鹤发童颜',
    '投鼠忌器',
    '坚如磐石',
    '芒刺在背',
    '高屋建瓴',
    '间不容发',
    '五里雾中',
    '按图索骥',
    '期期艾艾',
    '尸位素餐',
    '偷梁换柱',
    '倒执手版',
    '同类相求',
    '安土重还',
    '车载斗量',
    '徙薪曲突',
    '触目惊心',
    '白云亲舍',
    '门可罗雀',
    '探骊得珠',
    '林林总总',
    '休戚相关',
    '唐突西施',
    '毕恭毕敬',
    '鹤立鸡群',
    '一夔已足',
    '髀肉复生',
    '以邻为壑',
    '别无长物',
    '后起之秀',
    '间不容发',
    '瞠目结舌',
    '故步自封',
    '胁肩谄笑',
    '残杯冷炙',
    '倾筐倒箧',
    '怙恶不悛',
    '不甚了了',
    '瓜田李下',
    '尸位素餐',
    '一言兴邦',
    '别无长物',
    '东门黄犬',
    '结草衔环',
    '掌上观文',
    '泾渭分明',
    '一狐之腋',
    '蓬荜增辉',
    '髀肉复生',
    '繁文缛节',
    '优孟衣冠',
    '左提右携',
    '空谷足音',
    '予取予求',
    '宋玉东墙',
    '分道扬镳',
    '一木难支',
    '沆瀣一气'
);


//全局变量获取数据库
$db = new Workerman\MySQL\Connection('localhost', '3306', 'root', 'backto', 'chengyu');//本机为3306端口

//抢答器变量
$responder=0;

//客户端显示状态
$clientView['page']=1;//1为显示成语，2为显示抢答器
$clientView['chengyu']="欢迎参赛";

// 创建一个Worker监听端口,使用websocket协议通讯
$client_worker = new Worker("websocket://192.168.1.101:1235");//处理与客户端的长连接
$client_worker->count=1;                            //启动1个进程
$client_worker->onConnect=function ($connection)use(&$clientView){
    echo "client connection success!\n";
    if ($clientView['page']==2){
        $connection->send(json_encode(array("showResponder"=>1)));
    }else{
        $connection->send(json_encode(array('chengyu'=>$clientView['chengyu'])));
    }
};
$client_worker->onMessage=function ($connection,$data)use(&$responder,$client_worker){
    $data=json_decode($data,true);
    if (!$responder&&$data['act']=="responder"){
        $responder=1;
        echo "get responder\n";
        $connection->send(json_encode(array("responderSuccess"=>1)));
        foreach ($client_worker->connections as $connection) {
            echo "inside";
            $connection->send(json_encode(array("getResponder"=>1)));
        }
    }
};
$client_worker->onWorkerStart=function ($client_worker) use ($chengyu1,$chengyu2,$chengyu3,$db,&$responder,&$clientView){
    $control_worker=new Worker("websocket://192.168.1.101:1234");   //处理与控制台的长连接
    $control_worker->onConnect=function ($connection){
        echo "controller connection success!\n";
    };
    $control_worker->onMessage=function ($controller_connection,$data)use($client_worker,$chengyu1,$chengyu2,$chengyu3,$db,&$responder,&$clientView){
        $data=json_decode($data,true);
        if (isset($data['reset'])){
            if ($data['reset']=="client"){
                $response['chengyu']="欢迎参赛";
                echo "reset\n";
                $clientView['chengyu']="欢迎参赛";
                foreach ($client_worker->connections as $connection) {
                    $connection->send(json_encode(array("chengyu"=>"欢迎参赛")));
                }
                $controller_connection->send(json_encode($response));
                return;
            }
        }
        static $correctCount=0;
        static $i1=0;
        static $i2=0;
        static $i3=0;
        static $cache1=array(
            'group1'=>array('breakLaw'=>0,'skip'=>0),
            'group2'=>array('breakLaw'=>0,'skip'=>0),
            'group3'=>array('breakLaw'=>0,'skip'=>0),
            'group4'=>array('breakLaw'=>0,'skip'=>0),
            'group5'=>array('breakLaw'=>0,'skip'=>0),
            'group6'=>array('breakLaw'=>0,'skip'=>0),
            'group7'=>array('breakLaw'=>0,'skip'=>0),
            'group8'=>array('breakLaw'=>0,'skip'=>0),
            'group9'=>array('breakLaw'=>0,'skip'=>0),
            'group10'=>array('breakLaw'=>0,'skip'=>0),
            'group11'=>array('breakLaw'=>0,'skip'=>0),
            'group12'=>array('breakLaw'=>0,'skip'=>0),
            'extraGroup'=>array('breakLaw'=>0,'skip'=>0)
            );
        static $cache3=array(
            'group1'=>array('breakLaw'=>0,'skip'=>0),
            'group2'=>array('breakLaw'=>0,'skip'=>0),
            'group3'=>array('breakLaw'=>0,'skip'=>0),
            'group4'=>array('breakLaw'=>0,'skip'=>0),
            'group5'=>array('breakLaw'=>0,'skip'=>0),
            'group6'=>array('breakLaw'=>0,'skip'=>0),
            'group7'=>array('breakLaw'=>0,'skip'=>0),
            'group8'=>array('breakLaw'=>0,'skip'=>0),
            'group9'=>array('breakLaw'=>0,'skip'=>0),
            'group10'=>array('breakLaw'=>0,'skip'=>0),
            'group11'=>array('breakLaw'=>0,'skip'=>0),
            'group12'=>array('breakLaw'=>0,'skip'=>0),
            'extraGroup'=>array('breakLaw'=>0,'skip'=>0)
        );

        //控制台行为
        if ($data['part']=="part1"){            //第一关
            if ($data['act']=="showChengyu"){
                echo $data['act']."\n";
                $clientView['page']=1;
                foreach ($client_worker->connections as $connection) {
                    $connection->send(json_encode(array("showChengyu"=>1)));
                }
                return;
            }
            $response['part']="part1";
            echo "part1\n";
            echo "{$data['group']}: {$data['act']}\n";
            $response['msg']="";
            $response['msg'].="{$data['group']}: {$data['act']} <br>";

            if ($data['act']=="end"){                                              //该组回合结束
                if ($data['group']=='extraGroup'){
                    $clientView['chengyu']="欢迎参赛";
                    foreach ($client_worker->connections as $connection) {
                        $connection->send(json_encode(array("chengyu"=>"欢迎参赛")));
                    }
                    $response['msg'].="{$data['group']}: 回合结束<br>";
                    $response['chengyu']="欢迎参赛";
                    $controller_connection->send(json_encode($response));
                    return;
                }
                $row_count = $db->update('sum')->cols(array('part1'=>$correctCount))->where('name=:name')->bindValues(array('name'=>$data['group']))->query();
                if ($row_count>0){
                    $response['msg'].="{$data['group']}: 保存成绩成功<br>";
                }else{
                    $response['msg'].="{$data['group']}: 保存成绩失败！<br>";
                }
                $clientView['chengyu']="欢迎参赛";
                foreach ($client_worker->connections as $connection) {
                    $connection->send(json_encode(array("chengyu"=>"欢迎参赛")));
                }
                $response['chengyu']="欢迎参赛";
                $controller_connection->send(json_encode($response));
                return;
            }elseif ($data['act']=="start"){                                            //该组回合开始
                $cache1[$data['group']]['breakLaw']=0;
                $cache1[$data['group']]['skip']=0;
                $correctCount=0;
                $chengyu=$chengyu1[++$i1];
                $response['chengyu']=$chengyu;
                $clientView['chengyu']=$chengyu;
                foreach ($client_worker->connections as $connection) {
                    $connection->send(json_encode(array("chengyu"=>$chengyu)));
                }
                $controller_connection->send(json_encode($response));
                return;
            }
            if ($cache1[$data['group']]['breakLaw']>1){
                $response['alrt']="{$data['group']} 犯规数已经达到两次,该回合结束";
                $controller_connection->send(json_encode($response));
                return;
            }

            if ($cache1[$data['group']]['breakLaw']==1&&$data['act']=="breakLaw"){       //犯规, 但已经超过次数
                $cache1[$data['group']][$data['act']]++;
                $response['msg'].="{$data['group']}: die for Break Law<br>";
                echo "{$data['group']}: die for Break Law\n";
                $response['alrt']="{$data['group']} 犯规达到两次,回合结束";
                $clientView['chengyu']="欢迎参赛";
                foreach ($client_worker->connections as $connection) {
                    $connection->send(json_encode(array("fail"=>"犯规达到两次,回合结束","chengyu"=>"欢迎参赛")));
                }
                $response['chengyu']="欢迎参赛";
                $controller_connection->send(json_encode($response));
                return;
            }elseif ($cache1[$data['group']]['skip']==1&&$data['act']=="skip"){          //跳过,但已经超过次数
                $response['alrt']="{$data['group']} 已经跳过一次,不能再次跳过";
                $response['msg'].="{$data['group']}: cannot skip<br>";
                echo "{$data['group']}: cannot skip\n";
                foreach ($client_worker->connections as $connection) {
                    $connection->send(json_encode(array("fail"=>"已经选择跳过一次,不能再次跳过")));
                }
                $controller_connection->send(json_encode($response));
                return;
            }elseif($data['act']=="correct"){                                           //正确
                $correctCount++;
                $chengyu=$chengyu1[++$i1];
                $response['chengyu']=$chengyu;
                $clientView['chengyu']=$chengyu;
                foreach ($client_worker->connections as $connection) {
                    $connection->send(json_encode(array("chengyu"=>$chengyu)));
                }
                $controller_connection->send(json_encode($response));
                return;
            }else {                                                                     //跳过,或错误,且没超过次数
                $chengyu=$chengyu1[++$i1];
                $cache1[$data['group']][$data['act']]=1;
                $response['chengyu']=$chengyu;
                $clientView['chengyu']=$chengyu;
                foreach ($client_worker->connections as $connection) {
                    $connection->send(json_encode(array("chengyu"=>$chengyu)));
                }
                $controller_connection->send(json_encode($response));
                return;
            }
        }
        elseif ($data['part']=="part2"){               //第二关
            $response['part']=$data['part'];
            echo $data['part']."\n";
            echo $data['act']."\n";
            $response['msg']="";
            if ($data['act']=="next"){
                $chengyu=$chengyu2[++$i2];
                $response['chengyu']=$chengyu;
                $clientView['chengyu']=$chengyu;
                foreach ($client_worker->connections as $connection) {
                    $connection->send(json_encode(array("chengyu"=>$chengyu)));
                }
                $controller_connection->send(json_encode($response));
                return;
            }
        }
        elseif ($data['part']=="part3"){            //第三关
            $response['part']="part3";
            echo "part3\n";
            echo "{$data['group']}: {$data['act']}\n";
            $response['msg']="";
            $response['msg'].="{$data['group']}: {$data['act']} <br>";

            if ($data['act']=="end"){                                              //该组回合结束
                if ($data['group']=='extraGroup'){
                    $clientView['chengyu']="欢迎参赛";
                    foreach ($client_worker->connections as $connection) {
                        $connection->send(json_encode(array("chengyu"=>"欢迎参赛")));
                    }
                    $response['msg'].="{$data['group']}: 回合结束<br>";
                    $response['chengyu']="欢迎参赛";
                    $controller_connection->send(json_encode($response));
                    return;
                }
                $row_count = $db->update('sum')->cols(array('part3'=>$correctCount))->where('name=:name')->bindValues(array('name'=>$data['group']))->query();
                if ($row_count>0){
                    $response['msg'].="{$data['group']}: 保存成绩成功<br>";
                }else{
                    $response['msg'].="{$data['group']}: 保存成绩失败！<br>";
                }
                $clientView['chengyu']="欢迎参赛";
                foreach ($client_worker->connections as $connection) {
                    $connection->send(json_encode(array("chengyu"=>"欢迎参赛")));
                }
                $response['chengyu']="欢迎参赛";
                $controller_connection->send(json_encode($response));
                return;
            }elseif ($data['act']=="start"){                                            //该组回合开始
                $cache3[$data['group']]['breakLaw']=0;
                $cache3[$data['group']]['skip']=0;
                $correctCount=0;
                $chengyu=$chengyu3[++$i3];
                $response['chengyu']=$chengyu;
                $clientView['chengyu']=$chengyu;
                foreach ($client_worker->connections as $connection) {
                    $connection->send(json_encode(array("chengyu"=>$chengyu)));
                }
                $controller_connection->send(json_encode($response));
                return;
            }
            if ($cache3[$data['group']]['breakLaw']>1){
                $response['alrt']="{$data['group']} 犯规数已经达到两次,该回合结束";
                $controller_connection->send(json_encode($response));
                return;
            }

            if ($cache3[$data['group']]['breakLaw']==1&&$data['act']=="breakLaw"){       //犯规, 但已经超过次数
                $cache3[$data['group']][$data['act']]++;
                $response['msg'].="{$data['group']}: die for Break Law<br>";
                echo "{$data['group']}: die for Break Law\n";
                $response['alrt']="{$data['group']} 犯规达到两次,回合结束";
                $clientView['chengyu']="欢迎参赛";
                foreach ($client_worker->connections as $connection) {
                    $connection->send(json_encode(array("fail"=>"犯规达到两次,回合结束","chengyu"=>"欢迎参赛")));
                }
                $response['chengyu']="欢迎参赛";
                $controller_connection->send(json_encode($response));
                return;
            }elseif ($cache3[$data['group']]['skip']==1&&$data['act']=="skip"){          //跳过,但已经超过次数
                $response['alrt']="{$data['group']} 已经跳过一次,不能再次跳过";
                $response['msg'].="{$data['group']}: cannot skip<br>";
                echo "{$data['group']}: cannot skip\n";
                foreach ($client_worker->connections as $connection) {
                    $connection->send(json_encode(array("fail"=>"已经选择跳过一次,不能再次跳过")));
                }
                $controller_connection->send(json_encode($response));
                return;
            }elseif($data['act']=="correct"){                                           //正确
                $correctCount++;
                $chengyu=$chengyu3[++$i3];
                $response['chengyu']=$chengyu;
                $clientView['chengyu']=$chengyu;
                foreach ($client_worker->connections as $connection) {
                    $connection->send(json_encode(array("chengyu"=>$chengyu)));
                }
                $controller_connection->send(json_encode($response));
                return;
            }else {                                                                     //跳过,或错误,且没超过次数
                $chengyu=$chengyu3[++$i3];
                $cache3[$data['group']][$data['act']]=1;
                $response['chengyu']=$chengyu;
                $clientView['chengyu']=$chengyu;
                foreach ($client_worker->connections as $connection) {
                    $connection->send(json_encode(array("chengyu"=>$chengyu)));
                }
                $controller_connection->send(json_encode($response));
                return;
            }
        }
        elseif($data['part']=="part4"){                                            //第四关
            $response['msg']="";
            $response['part']="part4";
            if ($data['act']=="showResponder"){
                echo $data['act']."\n";
                $clientView['page']=2;
                foreach ($client_worker->connections as $connection) {
                    $connection->send(json_encode(array("showResponder"=>1)));
                }
                $response['msg'].=$data['act']."<br>";
                $controller_connection->send(json_encode($response));
                return;
            }
            if ($data['act']=='resetResponder'){
                $responder=0;
                echo $data['act']."\n";
                foreach ($client_worker->connections as $connection) {
                    $connection->send(json_encode(array("resetResponder"=>1)));
                }
                $response['msg'].=$data['act']."<br>";
                $controller_connection->send(json_encode($response));
                return;
            }

        }

    };
    $control_worker->listen();                  //worker嵌套    必不可少
};

// 运行worker
Worker::runAll();
?>