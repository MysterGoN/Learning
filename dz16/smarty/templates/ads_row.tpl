<tr>
    <td>{$ad->get_id()}</td>
    <td><a  href='?id={$ad->get_id()|replace:'"':''}'>{$ad->get_title()}</a></td>
    <td>{$ad->get_price()}</td>
    <td>{$ad->get_name()}</td>
    <td>
        <a class="delete btn btn-warning">удалить</a>
    </td>
</tr>