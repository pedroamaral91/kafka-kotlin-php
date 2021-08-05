package com.cleanarchkotlin.domain.errors

import javax.ws.rs.WebApplicationException
import javax.ws.rs.core.MediaType
import javax.ws.rs.core.Response

class InvalidParamError(
    private val field: String,
    private val res: Response = Response.status(Response.Status.BAD_REQUEST)
        .entity(mapOf("error" to "Invalid param error: $field")).type(
            MediaType.APPLICATION_JSON,
        ).build(),
) :
    WebApplicationException(res)