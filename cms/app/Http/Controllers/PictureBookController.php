<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PictureBook;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PictureBookController extends Controller
{
    public function create()
    {
        $pictureBook = PictureBook::where('user_id', Auth::id())->first();
        $babyName = $pictureBook ? $pictureBook->baby_name : '赤ちゃんの名前';

        $stories = [
            'story1' => $pictureBook->story_1 ?? 'ある日、ママはお医者さんから「赤ちゃんがいますよ」と言われました。ずっと待ち望んでいた知らせに、ママは胸がいっぱいになりました。',
            'story2' => $pictureBook->story_2 ?? 'パパも同じように、嬉しさと驚きで胸がドキドキしました。私たちのもとに赤ちゃんが来てくれるなんて、本当に夢みたいでした。',
            'story3' => $pictureBook->story_3 ?? 'ママのお腹が少しずつ大きくなるたびに、赤ちゃんが元気に育っていることを感じました。毎晩、お腹に手を当てて「元気に育ってね」と話しかけました。',
            'story4' => $pictureBook->story_4 ?? 'パパも毎日、赤ちゃんに話しかけていました。「パパだよ。会える日が待ち遠しいよ」。赤ちゃんが動くのを感じると、二人で喜びました。',
            'story5' => $pictureBook->story_5 ?? 'ついに出産の日がやってきました。ママは少し不安もありましたが、何よりも赤ちゃんに会える喜びが勝りました。',
            'story6' => $pictureBook->story_6 ?? 'パパはママを励ましながら、一緒にドキドキしていました。赤ちゃんが生まれた瞬間、二人とも涙がこぼれました。赤ちゃんが「こんにちは」と言ってくれた気がしました。',
            'story7' => $pictureBook->story_7 ?? '生まれてきた赤ちゃんを見て、パパとママは「○○ちゃん」という名前をつけました。この名前にはたくさんの愛と希望が込められています。',
            'story8' => $pictureBook->story_8 ?? '「○○ちゃん、あなたが私たちのもとに来てくれて本当に嬉しいよ」。名前を呼ぶたびに、幸せな気持ちが溢れてきます。',
            'story9' => $pictureBook->story_9 ?? 'ママと赤ちゃんは病院でしばらく過ごしました。お医者さんや看護師さんがたくさんお手伝いしてくれました。パパも毎日会いに来てくれました。',
            'story10' => $pictureBook->story_10 ?? '毎日少しずつ、赤ちゃんと一緒に過ごす時間が増えていきました。パパとママは赤ちゃんが笑うたびに、心から幸せを感じました。',
            'story11' => $pictureBook->story_11 ?? '家に帰ってから、パパとママは赤ちゃんとの新しい生活を始めました。毎日、赤ちゃんのために色んなことをしました。お歌を歌ったり、絵本を読んだり。',
            'story12' => $pictureBook->story_12 ?? '赤ちゃんの笑顔や泣き声、一つ一つが宝物です。私たちのもとに来てくれて、本当にありがとう。これからもずっと一緒だよ。',
            'story13' => $pictureBook->story_13 ?? '親愛なる○○ちゃんへ、あなたが生まれてきてくれて、本当にありがとう。あなたのおかげで、毎日がとても幸せです。',
            'story14' => $pictureBook->story_14 ?? 'これからもずっと、一緒に楽しい思い出を作りましょう。愛を込めて、パパとママより。'
        ];

        return view('create', compact('babyName', 'stories'));
    }

    public function getStory(Request $request)
    {
        Log::info('getStory called with imageId: ' . $request->input('imageId'));

        try {
            $storyId = $request->input('imageId');
            $pictureBook = PictureBook::where('user_id', Auth::id())->first();

            if (!$pictureBook) {
                Log::error('PictureBook not found for user_id: ' . Auth::id());
                return response()->json(['error' => 'PictureBook not found'], 404);
            }

            $stories = [
                'left1' => $pictureBook->story_1 ?? 'ある日、ママはお医者さんから「赤ちゃんがいますよ」と言われました。ずっと待ち望んでいた知らせに、ママは胸がいっぱいになりました。',
                'right1' => $pictureBook->story_2 ?? 'パパも同じように、嬉しさと驚きで胸がドキドキしました。私たちのもとに赤ちゃんが来てくれるなんて、本当に夢みたいでした。',
                'left2' => $pictureBook->story_3 ?? 'ママのお腹が少しずつ大きくなるたびに、赤ちゃんが元気に育っていることを感じました。毎晩、お腹に手を当てて「元気に育ってね」と話しかけました。',
                'right2' => $pictureBook->story_4 ?? 'パパも毎日、赤ちゃんに話しかけていました。「パパだよ。会える日が待ち遠しいよ」。赤ちゃんが動くのを感じると、二人で喜びました。',
                'left3' => $pictureBook->story_5 ?? 'ついに出産の日がやってきました。ママは少し不安もありましたが、何よりも赤ちゃんに会える喜びが勝りました。',
                'right3' => $pictureBook->story_6 ?? 'パパはママを励ましながら、一緒にドキドキしていました。赤ちゃんが生まれた瞬間、二人とも涙がこぼれました。赤ちゃんが「こんにちは」と言ってくれた気がしました。',
                'left4' => $pictureBook->story_7 ?? '生まれてきた赤ちゃんを見て、パパとママは「○○ちゃん」という名前をつけました。この名前にはたくさんの愛と希望が込められています。',
                'right4' => $pictureBook->story_8 ?? '「○○ちゃん、あなたが私たちのもとに来てくれて本当に嬉しいよ」。名前を呼ぶたびに、幸せな気持ちが溢れてきます。',
                'left5' => $pictureBook->story_9 ?? 'ママと赤ちゃんは病院でしばらく過ごしました。お医者さんや看護師さんがたくさんお手伝いしてくれました。パパも毎日会いに来てくれました。',
                'right5' => $pictureBook->story_10 ?? '毎日少しずつ、赤ちゃんと一緒に過ごす時間が増えていきました。パパとママは赤ちゃんが笑うたびに、心から幸せを感じました。',
                'left6' => $pictureBook->story_11 ?? '家に帰ってから、パパとママは赤ちゃんとの新しい生活を始めました。毎日、赤ちゃんのために色んなことをしました。お歌を歌ったり、絵本を読んだり。',
                'right6' => $pictureBook->story_12 ?? '赤ちゃんの笑顔や泣き声、一つ一つが宝物です。私たちのもとに来てくれて、本当にありがとう。これからもずっと一緒だよ。',
                'left7' => $pictureBook->story_13 ?? '親愛なる○○ちゃんへ、あなたが生まれてきてくれて、本当にありがとう。あなたのおかげで、毎日がとても幸せです。',
                'right7' => $pictureBook->story_14 ?? 'これからもずっと、一緒に楽しい思い出を作りましょう。愛を込めて、パパとママより。',
            ];

            $story = $stories[$storyId] ?? 'デフォルト初期値';

            return response()->json(['story' => $story]);
        } catch (\Exception $e) {
            Log::error('Error in getStory: ' . $e->getMessage());
            return response()->json(['error' => 'ストーリーの取得に失敗しました'], 500);
        }
    }

    public function saveStory(Request $request)
    {
        Log::info('saveStory called with imageId: ' . $request->input('imageId') . ' and story: ' . $request->input('story'));

        try {
            $storyId = $request->input('imageId');
            $story = $request->input('story');
            $pictureBook = PictureBook::where('user_id', Auth::id())->first();

            if (!$pictureBook) {
                $pictureBook = new PictureBook();
                $pictureBook->user_id = Auth::id();
            }

            switch ($storyId) {
                case 'left1':
                    $pictureBook->story_1 = $story;
                    break;
                case 'right1':
                    $pictureBook->story_2 = $story;
                    break;
                case 'left2':
                    $pictureBook->story_3 = $story;
                    break;
                case 'right2':
                    $pictureBook->story_4 = $story;
                    break;
                case 'left3':
                    $pictureBook->story_5 = $story;
                    break;
                case 'right3':
                    $pictureBook->story_6 = $story;
                    break;
                case 'left4':
                    $pictureBook->story_7 = $story;
                    break;
                case 'right4':
                    $pictureBook->story_8 = $story;
                    break;
                case 'left5':
                    $pictureBook->story_9 = $story;
                    break;
                case 'right5':
                    $pictureBook->story_10 = $story;
                    break;
                case 'left6':
                    $pictureBook->story_11 = $story;
                    break;
                case 'right6':
                    $pictureBook->story_12 = $story;
                    break;
                case 'left7':
                    $pictureBook->story_13 = $story;
                    break;
                case 'right7':
                    $pictureBook->story_14 = $story;
                    break;
                default:
                    Log::error('Invalid imageId: ' . $storyId);
                    return response()->json(['error' => 'Invalid imageId'], 400);
            }

            $pictureBook->save();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error('Error in saveStory: ' . $e->getMessage());
            return response()->json(['error' => 'ストーリーの保存に失敗しました'], 500);
        }
    }

    public function updateStory(Request $request)
    {
        Log::info('updateStory called with imageId: ' . $request->input('imageId') . ' and story: ' . $request->input('story'));

        try {
            $storyId = $request->input('imageId');
            $story = $request->input('story');
            $pictureBook = PictureBook::where('user_id', Auth::id())->first();

            if (!$pictureBook) {
                return response()->json(['error' => 'PictureBook not found'], 404);
            }

            switch ($storyId) {
                case 'left1':
                    $pictureBook->story_1 = $story;
                    break;
                case 'right1':
                    $pictureBook->story_2 = $story;
                    break;
                case 'left2':
                    $pictureBook->story_3 = $story;
                    break;
                case 'right2':
                    $pictureBook->story_4 = $story;
                    break;
                case 'left3':
                    $pictureBook->story_5 = $story;
                    break;
                case 'right3':
                    $pictureBook->story_6 = $story;
                    break;
                case 'left4':
                    $pictureBook->story_7 = $story;
                    break;
                case 'right4':
                    $pictureBook->story_8 = $story;
                    break;
                case 'left5':
                    $pictureBook->story_9 = $story;
                    break;
                case 'right5':
                    $pictureBook->story_10 = $story;
                    break;
                case 'left6':
                    $pictureBook->story_11 = $story;
                    break;
                case 'right6':
                    $pictureBook->story_12 = $story;
                    break;
                case 'left7':
                    $pictureBook->story_13 = $story;
                    break;
                case 'right7':
                    $pictureBook->story_14 = $story;
                    break;
                default:
                    Log::error('Invalid imageId: ' . $storyId);
                    return response()->json(['error' => 'Invalid imageId'], 400);
            }

            $pictureBook->save();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error('Error in updateStory: ' . $e->getMessage());
            return response()->json(['error' => 'ストーリーの更新に失敗しました'], 500);
        }
    }
}

