<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupType;
use App\Models\GroupUser;
use App\Models\GroupUserData;
use App\Models\User;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    #region Groups

    public function index()
    {
        return view('records.index', [
            'groups' => Group::latest()
                ->filter(request(['search']))
                ->paginate(4)
                ->withQueryString() // searched results will also get paginated.
        ]);
    }

    public function create()
    {
        return view('records.create');
    }

    public function store(Request $request)
    {
        Group::create(
            $request->validate([
                'name' => 'required|min:1|max:50|unique:groups,name'
            ])
            // 'name' => $request->input('name')
        );

        return redirect()->route('groups');
    }

    public function edit(Group $group)
    {
        if (is_null($group)) {
            return redirect()->route('groups');
        }

        return view('records.edit')
            ->with(['groups' => $group]);
    }

    public function update(Request $request, $id)
    {
        Group::whereId($id)
            ->update(
                $request->validate([
                    'name' => 'required|min:1|max:50|unique:groups,name,' . $id
                ])
            );

        return redirect()->route('groups');
    }

    public function destroy(Group $group)
    {
        if (!is_null($group)) {
            $group->delete();
        }

        return redirect()->route('groups');
    }

    #endregion

    #region GroupTypes

    public function typeIndex()
    {
        return view('types.index', [
            'types' => GroupType::with('group')
                ->orderBy('group_id')
                ->filter(request(['search']))
                ->paginate(5)
                ->withQueryString()
        ]);
    }

    public function typeCreate()
    {
        return view('types.create', [
            'groups' => Group::all()
        ]);
    }

    public function typeStore(Request $request)
    {
        GroupType::create(
            $request->validate([
                'group_id'    => 'required',
                'name'        => 'required|min:1|max:50|unique:group_types,name',
                'description' => 'max:50'
            ])
        );

        return redirect()->route('groups.types');
    }

    public function typeEdit(GroupType $type)
    {
        if (is_null($type)) {
            return redirect()->route('groups.type');
        }

        return view('types.edit')
            ->with([
                'type'   => $type,
                'groups' => Group::all()
            ]);
    }

    public function typeUpdate(Request $request, $id)
    {
        GroupType::whereId($id)
            ->update(
                $request->validate([
                    'group_id'    => 'required',
                    'name'        => 'required|min:1|max:50|unique:group_types,name,' . $id,
                    'description' => 'max:50'
                ])
            );

        return redirect()->route('groups.types');
    }

    public function typeDestroy(GroupType $type)
    {
        if (!is_null($type)) {
            $type->delete();
        }

        return redirect()->route('groups.types');
    }

    #endregion

    #region GroupData

    public function dataIndex()
    {
        return view('data.index', [
            'allGroups' => Group::orderBy('name')->with('group_types')->get(),
            'allTypes'  => GroupType::where('group_id', request('group'))->get(),
            // 'allData'   => GroupData::with('group_type')
            //     ->whereHas('group_type', function ($query) {
            //         return $query
            //             ->where('group_id', request('group'));
            //     })->get(),
        ]);
    }

    public function dataStore()
    {
        $groupUser = GroupUser::create([
            'user_id'  => 1,
            'group_id' => request()->input('group_id'),
        ]);

        // $groupTypes = GroupType::with('group')->whereHas('group', function ($query) {
        //     return $query->where('id', request()->input('group_id'));
        // })->get();

        $group = Group::find(request()->input('group_id'));

        foreach ($group->group_types as $type) {
            $row = new GroupUserData();
            $row->group_user_id = $groupUser->id;
            $row->group_type_id = $type->id;
            $row->value = request()->input($type->id);
            $row->save();
        }

        return redirect()->back();
    }

    public function showData()
    {
        $users = User::all();
        $groups = Group::all();
        return view('data.show', [
            'groupUserDatas' => GroupUserData::with('group_user')->where('group_user_id', 1)->get(),
            'groupUsers' => GroupUser::all(),
            'users' => $users,
            'groups' => $groups
        ]);

        // foreach ($courseVideos as $video) {
        //     if ($video->is_active) {
        //         $orderDetail = new OrderDetail();
        //         $orderDetail->video_id = $video->id;
        //         $orderDetail->order()->associate($this->orderId);
        //         $orderDetail->save();
        //     }
        // }
    }

    #endregion
}
