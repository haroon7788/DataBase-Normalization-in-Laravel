<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupType;
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
            'allGroups' => Group::orderBy('name')->with('group_type')->get(),
            'allTypes'  => GroupType::with('group_data')->where('group_id', request('group'))->get()
            // 'allData'   => GroupData::with('group_type')
            //     ->whereHas('group_type', function ($query) {
            //         return $query
            //             ->where('group_id', request('group'));
            //     })->get(),
        ]);
    }

    public function dataStore()
    {
        dd(request()->all());
    }

    #endregion
}
