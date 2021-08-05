package com.cleanarchkotlin.presentation.controllers

import com.cleanarchkotlin.data.contracts.CreateUser
import com.cleanarchkotlin.data.contracts.ListUser
import com.cleanarchkotlin.data.dto.UserDTO
import org.eclipse.microprofile.reactive.messaging.Channel
import org.eclipse.microprofile.reactive.messaging.Emitter
import javax.inject.Inject
import javax.ws.rs.GET
import javax.ws.rs.POST
import javax.ws.rs.Path
import javax.ws.rs.Produces
import javax.ws.rs.core.MediaType

@Path("/users")
class UserController @Inject constructor(
    private val persistPart: CreateUser,
    private val listPart: ListUser
) {

    @Inject
    @Channel("test")
    var priceEmitter: Emitter<Any>? = null

    @POST
    @Produces(MediaType.APPLICATION_JSON)
    fun save(userDTO: UserDTO) {
        val userDto = persistPart.create(userDTO.email, userDTO.password, userDTO.name)
        val emit = mapOf(
            "bank" to "banco do brasil",
            "account" to "1234",
            "agency" to "3634",
            "owner" to userDto.name
        )
        priceEmitter?.send(emit)
    }

    @GET
    @Produces(MediaType.APPLICATION_JSON)
    fun list() = listPart.list()
}